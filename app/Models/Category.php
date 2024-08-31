<?php

namespace App\Models;

use App\Models\Traits\CamelTimestamps;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $categoryName
 * @property \Illuminate\Support\Carbon $updatedAt
 * @property \Illuminate\Support\Carbon $createdAt
 * @property \Illuminate\Database\Eloquent\Collection<Product> $createdAt
 */
class Category extends Model
{
    use CamelTimestamps;

    protected $fillable = [
        'categoryName', 'category_name'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function categoryName(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['category_name'],
            set: fn($value) => ['category_name' => $value] 
        );
    }
}
