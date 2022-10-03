<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'kd_prsh' => $this->kd_prsh,
            'kd_kprd' => $this->kd_kprd,
            'name' => $this->name,
            'identifier' => $this->identifier,
            'email' => $this->email,
            'created_at' => $this->created_at->diffForHumans(),
            'fl_stat' => $this->fl_stat,
        ];
    }
}
