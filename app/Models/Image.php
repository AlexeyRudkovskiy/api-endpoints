<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $position
 * @property string $filename
 * @property int $product_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Product $product
 */
class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;

    protected $fillable = [ 'position', 'filename', 'product_id' ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
