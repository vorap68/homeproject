<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'descriptions' => $this->descriptions,
            'slug' => $this->slug,
            'price' => $this->price,
            'count' => $this->count,
            'category' => $this->category->name,
            'property' => $this->property()->select('size', 'color', 'state')->get(),

        ];
    }
}
