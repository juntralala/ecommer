<?php

namespace App\Models;

use App\Models\Traits\CamelDeletedAt;
use App\Models\Traits\CamelTimestamps;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $productId
 * @property string $photo
 * @property bool $isDefault
 * @property \Illuminate\Support\Carbon $deletedAt
 * @property \Illuminate\Support\Carbon $createdAt
 * @property \Illuminate\Support\Carbon $updatedAt
 * @property Product $product
 */
class ProductGalery extends Model
{
    use SoftDeletes;
    use CamelDeletedAt;
    use CamelTimestamps;

    protected $fillable = [
        'product_id',
        'productId',
        'photo',
        'is_default',
        'isDefault',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function photo($value): Attribute
    {
        return Attribute::get(fn()=> asset("storage/$value"));
    }

    public function productId(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['product_id'],
            set: fn($value) => ['product_id' => $value]
        );
    }

    public function isDefault(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['is_default'],
            set: fn($value) => ['is_default' => $value]
        );
    }
}
