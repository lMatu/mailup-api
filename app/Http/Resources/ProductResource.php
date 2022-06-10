<?php

namespace App\Http\Resources;

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
            'description' => is_null($this->description) ? '' : $this->description,
            'image' =>  $this->image,
            'brand' => ($this->category) ? $this->category->brand->name : "",
            'price' => number_format($this->price, 2),
            'price_sale' => number_format($this->price_sale, 2),
            'category' => ($this->category) ? $this->category->name : "",
            'stock' => $this->stock
        ];
    }
}
