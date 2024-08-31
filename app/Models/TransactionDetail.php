<?php

namespace App\Models;

use App\Models\Traits\CamelDeletedAt;
use App\Models\Traits\CamelTimestamps;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $transactionId
 * @property int $productId
 * @property int $quantity
 * @property \Illuminate\Support\Carbon $deletedAt
 * @property \Illuminate\Support\Carbon $updatedAt
 * @property \Illuminate\Support\Carbon $createdAt
 * @property Transaction $transaction
 * @property Product $product
 * 
 */
class TransactionDetail extends Model
{
    use CamelDeletedAt, CamelTimestamps;

    protected $fillable = [
        'product_id', 'productId',
        'transaction_id', 'transactionId',
        'quantity'
    ];

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function function(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productId(): Attribute 
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['product_id'],
            set: fn($value, $attributes) => ['product_id' => $value]
        );
    }

    public function transactionId(): Attribute 
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['transaction_id'],
            set: fn($value, $attributes) => ['transaction_id' => $value]
        );
    }

}
