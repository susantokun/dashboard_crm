<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfigurationGlobalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        JsonResource::withoutWrapping();

        return [
            'kd_prsh' => $this->kd_prsh,
            'kd_kprd' => $this->kd_kprd,
            'gr_user' => $this->gr_user,
            'gr_mtra' => $this->gr_mtra,
            'title' => $this->title,
            'title_short' => $this->title_short,
            'author' => $this->author,
            'author_url' => $this->author_url,
            'favicon' => $this->favicon,
            'logo' => $this->logo,
            'address' => $this->address,
            'email' => $this->email,
            'phone' => $this->phone,
            'map_iframe' => $this->map_iframe,
            'map_url' => $this->map_url,
            'place_of_birth' => $this->place_of_birth,
            'date_of_birth' => $this->date_of_birth,

            'slogan' => $this->slogan,
            'teaser' => str($this->teaser)->markdown(),
            'keywords' => $this->keywords,
        ];
    }
}
