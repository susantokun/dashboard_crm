<?php

namespace App\View\Composers;

use App\Models\U_comp;
use Illuminate\View\View;
use App\Http\Resources\ConfigurationGlobalResource;

class ConfigurationComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (auth()->user()) {
            $configuration = U_comp::whereActive()->where('kd_prsh', auth()->user()->kd_prsh)->first();
        } else {
            $configuration = U_comp::whereActive()->where('kd_prsh', 'DIFO')->first();
        }

        $configuration = new ConfigurationGlobalResource($configuration);

        $view->with('configuration', $configuration);
    }
}
