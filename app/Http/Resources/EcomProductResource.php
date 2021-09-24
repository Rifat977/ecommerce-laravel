<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EcomProductResource extends JsonResource
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
            'productName' => $this->productName,
            'category' => $this->Category->name,
            'categoryId' => $this->categoryId,
            'sku' => $this->sku,
            'image' => 'storage/'.$this->image,
            'regularPrice' => $this->regularPrice,
            'price' => $this->price,
            'stock' => $this->stock,
            'description' => $this->description,
        ];
    }
}
