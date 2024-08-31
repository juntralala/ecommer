<?php

namespace App\Models;

use App\Models\Traits\CamelDeletedAt;
use App\Models\Traits\CamelTimestamps;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property int $id
 * @property string $name
 * @property int $categoryId
 * @property string $description
 * @property int $price
 * @property int $quantity
 * @property \Illuminate\Support\Carbon $deletedAt
 * @property \Illuminate\Support\Carbon $createdAt
 * @property \Illuminate\Support\Carbon $updatedAt
 * @property Category $category
 * @property \Illuminate\Database\Eloquent\Collection<ProductGalery> $productGaleries
 */
class Product extends Model
{
    use SoftDeletes;
    use CamelDeletedAt;
    use CamelTimestamps;

    protected $fillable = [
        'name',
        'category_id', 'categoryId',
        'description',
        'price',
        'quantity'
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function productGaleries(): BelongsTo
    {
        return $this->belongsTo(ProductGalery::class);
    }
    
    public function categoriesId(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['categories_id'],
            set: fn($value) => ['categories_id' => $value] 
        );
    }
}