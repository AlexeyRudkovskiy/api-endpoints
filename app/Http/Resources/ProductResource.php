<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public static $wrap = false;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'categoryPath' => $this->getCategoryPath()
                ->map(fn (Category $category) => $category->title)
                ->join(' -> '),
            'name' => $this->title,
            'price' => $this->price,
            'priceDiscount' => $this->price_discount < $this->price ? $this->price_discount : 0,
            'isEnding' => $this->quantity > 0 && $this->quantity < 10,
            'images' => ImagesCollection::collection($this->images()->sorted()->get())
        ];
    }
}
