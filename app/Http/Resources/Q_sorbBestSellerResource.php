<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Q_sorbBestSellerResource extends JsonResource
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
            'label' => $this->m_matr->tx_matr,
            'score' => number_format($this->score, 0, ',', ''),
        ];
    }
}
