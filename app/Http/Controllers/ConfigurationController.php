<?php

namespace App\Http\Controllers;

use Image;
use App\Models\U_comp;
use App\Models\SeoPage;
use App\Enums\GeneralStatus;
use Illuminate\Http\Request;
use App\Enums\GlobalFlStatus;
use App\Models\Configuration;
use App\Http\Resources\SeoPageResource;
use Illuminate\Support\Facades\Storage;

class ConfigurationController extends Controller
{
    public $statuses;

    public function __construct()
    {
        $this->statuses = collect(GlobalFlStatus::cases())->map(fn ($status) => [
            'id' => $status->value,
            'name' => str($status->label())->ucfirst()
        ])->pluck('name', 'id');
    }

    // public function feAbout()
    // {
    //     $seo_page = SeoPage::where('code', 'about')->get();
    //     $data = Configuration::first();

    //     return view('frontend.pages.about', [
    //         'data' => $data->translate()->about,
    //         'seo_page' => SeoPageResource::collection($seo_page)->first(),
    //     ]);
    // }

    // public function feContact()
    // {
    //     $seo_page = SeoPage::where('code', 'contact')->get();
    //     $data = Configuration::first([
    //         'address',
    //         'email',
    //         'phone',
    //         'map_src',
    //         'map_url',
    //     ]);

    //     return view('frontend.pages.contact', [
    //         'data' => $data,
    //         'seo_page' => SeoPageResource::collection($seo_page)->first(),
    //     ]);
    // }

    // public function fePrivacyPolicy()
    // {
    //     $seo_page = SeoPage::where('code', 'privacy_policy')->get();
    //     $data = Configuration::first();

    //     return view('frontend.pages.privacy-policy', [
    //         'data' => $data->translate()->privacy_policy,
    //         'seo_page' => SeoPageResource::collection($seo_page)->first(),
    //     ]);
    // }

    // public function feTermAndCondition()
    // {
    //     $seo_page = SeoPage::where('code', 'term_and_condition')->get();
    //     $data = Configuration::first();

    //     return view('frontend.pages.term-and-condition', [
    //         'data' => $data->translate()->term_and_condition,
    //         'seo_page' => SeoPageResource::collection($seo_page)->first(),
    //     ]);
    // }

    public function general()
    {
        $data = U_comp::whereActive()->whereKdPrsh()->first();

        $statuses = $this->statuses;

        return view('backend.pages.configurations.general', compact('data', 'statuses'));
    }

    public function generalUpdate(Request $request, $id)
    {
        $configuration = U_comp::where('id', $id)->first([
            'id',
            'favicon',
            'logo'
        ]);

        $this->validate($request, [
            'title' => ['required'],
            'title_short' => ['required'],
            'slogan' => ['required'],
            'teaser' => ['required'],
            'favicon' => ['nullable', 'max:1024'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:1024'],
            'author' => ['required'],
            'author_url' => ['required', 'url'],
            'place_of_birth' => ['required'],
            'date_of_birth' => ['required'],
            'keywords' => ['required'],
            'introduction' => ['required'],
        ]);

        $favicon = $request->file('favicon');
        $logo = $request->file('logo');

        if ($request->hasFile('favicon')) {
            $favicon_path = 'images/favicons/' . str()->random(40) . "." . $favicon->extension();

            if ($configuration->favicon) {
                if (Storage::exists($configuration->favicon)) {
                    Storage::delete($configuration->favicon);
                }
            }

            if ($favicon->extension() != 'ico') {
                $favicon_conv = Image::make($favicon);
                $favicon_conv->resize(32, 32, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put($favicon_path, $favicon_conv->encode());
            } else {
                Storage::putFileAs($favicon_path);
            }
        }

        if ($request->hasFile('logo')) {
            $logo_path = 'images/logos/' . str()->random(40) . "." . $logo->extension();

            $logo_conv = Image::make($logo);
            $logo_conv->resize(512, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            if ($configuration->logo) {
                if (Storage::exists($configuration->logo)) {
                    Storage::delete($configuration->logo);
                }
            }

            Storage::put($logo_path, $logo_conv->encode());
        }

        $input = [
            'title' => $request->title,
            'title_short' => $request->title_short,
            'slogan' => $request->slogan,
            'teaser' => $request->teaser,
            'favicon' => $request->hasFile('favicon') ? $favicon_path : $configuration->favicon,
            'logo' => $request->hasFile('logo') ? $logo_path : $configuration->logo,
            'author' => $request->author,
            'author_url' => $request->author_url,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'keywords' => $request->keywords,
            'introduction' => $request->introduction,
        ];

        $configuration->update($input);

        toast(__('Successfully updated', ['Attribute' => __('General')]), 'success');
        return redirect()->route('settings.configurations.general');
    }

    public function contact()
    {
        $data = U_comp::whereActive()->whereKdPrsh()->first([
            'id',
            'address',
            'email',
            'phone',
            'map_iframe',
            'map_url',
            'map_api',
            'map_latitude',
            'map_longitude',
        ]);

        return view('backend.pages.configurations.contact', [
            'data' => $data
        ]);
    }

    public function contactUpdate(Request $request, $id)
    {
        $configuration = U_comp::where('id', $id)->first();

        $this->validate($request, [
            'address' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'map_iframe' => ['required'],
            'map_url' => ['required', 'url'],
            'map_api' => ['nullable'],
            'map_latitude' => ['nullable'],
            'map_longitude' => ['nullable'],
        ]);

        $input = [
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'map_iframe' => $request->map_iframe,
            'map_url' => $request->map_url,
            'map_api' => $request->map_api,
            'map_latitude' => $request->map_latitude,
            'map_longitude' => $request->map_longitude,
            'updated_by' => auth()->user()->id
        ];

        $configuration->update($input);

        toast(__('Successfully updated', ['Attribute' => __('Contact')]), 'success');
        return redirect()->route('settings.configurations.contact');
    }

    public function about()
    {
        $data = U_comp::whereActive()->whereKdPrsh()->first();

        return view('backend.pages.configurations.about', [
            'data' => $data
        ]);
    }

    public function aboutUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'about' => ['required'],
        ]);

        $configuration = U_comp::where('id', $id)->first();

        $input = [
            'updated_by' => auth()->user()->id,
            'about' => $request->about,
        ];

        $configuration->update($input);

        toast(__('Successfully updated', ['Attribute' => __('About')]), 'success');
        return redirect()->route('settings.configurations.about');
    }

    // public function privacyPolicy()
    // {
    //     $data = Configuration::where('status', GeneralStatus::PUBLISHED)->first();

    //     return view('backend.pages.configurations.privacy-policy', [
    //         'data' => $data
    //     ]);
    // }

    // public function privacyPolicyUpdate(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'id_privacy_policy' => 'required',
    //         'en_privacy_policy' => 'nullable',
    //     ]);

    //     $configuration = Configuration::where('id', $id)->first();

    //     $input = [
    //         'updated_by' => auth()->user()->id,
    //         'id' => [
    //             'privacy_policy' => $request->id_privacy_policy,
    //         ],
    //         'en' => [
    //             'privacy_policy' => $request->en_privacy_policy,
    //         ],
    //     ];

    //     $configuration->update($input);

    //     toast(__('Successfully updated', ['Attribute' => __('Privacy Policy')]), 'success');
    //     return redirect()->route('settings.configurations.privacyPolicy');
    // }

    // public function termAndCondition()
    // {
    //     $data = Configuration::where('status', GeneralStatus::PUBLISHED)->first();

    //     return view('backend.pages.configurations.term-and-condition', [
    //         'data' => $data
    //     ]);
    // }

    // public function termAndConditionUpdate(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'id_term_and_condition' => 'required',
    //         'en_term_and_condition' => 'nullable',
    //     ]);

    //     $configuration = Configuration::where('id', $id)->first();

    //     $input = [
    //         'updated_by' => auth()->user()->id,
    //         'id' => [
    //             'term_and_condition' => $request->id_term_and_condition,
    //         ],
    //         'en' => [
    //             'term_and_condition' => $request->en_term_and_condition,
    //         ],
    //     ];

    //     $configuration->update($input);

    //     toast(__('Successfully updated', ['Attribute' => __('Term and Condition')]), 'success');
    //     return redirect()->route('settings.configurations.termAndCondition');
    // }
}
