<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsCollection extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $image = $this->images()->sorted()->first();

        return [
            'id' => $this->id,
            'categoryName' => $this->category?->title,
            'name' => $this->title,
            'price' => $this->price_discount > 0 ? $this->price_discount : $this->price,
            'inStock' => $this->quantity > 0 && ($this->price > 0 || $this->price_discount > 0),
            'images' => $image !== null
                ? url('/storage/uploads/' . $image?->filename)
                : null
        ];
    }
}
