<?php

namespace App\Http\Resources\Product;

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
        $discount = null;
        if ($this->category === 'insurance') {
            $discount = 0.3;
            $final = $this->price - ($this->price * $discount);
        } else if ($this->sku === '000003') {
            $discount = 0.15;
            $final = $this->price - ($this->price * $discount);
        } else {
            $final = $this->price;
        }

        return [
            'sku' => $this->sku,
            'name' => $this->name,
            'category' => $this->category,
            'price' => [
                'original' => $this->price,
                'final' => $final,
                'discount_percentage' => is_null($discount) ? null : ($discount * 100 . '%'),
                'currency' => 'EUR'
            ]
        ];
    }
}
