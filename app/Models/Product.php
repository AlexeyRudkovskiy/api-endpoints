<?php

namespace App\Models;

use App\Casts\Price;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $price
 * @property int $price_discount
 * @property int $quantity
 * @property int $category_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Category $category
 */
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'price', 'price_discount', 'quantity', 'category_id'
    ];

    protected function casts()
    {
        return [
            'price' => Price::class,
            'price_discount' => Price::class,
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function getCategoryPath()
    {
        $categories = collect([]);

        if ($this->category_id === null) {
            return $categories;
        }

        $currentCategory = $this->category;
        while ($currentCategory !== null) {
            $categories->push($currentCategory);
            $currentCategory = $currentCategory->parent()->first();
        }

        return $categories;
    }

}
