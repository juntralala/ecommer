<?php

namespace App\Models;

use App\Models\Traits\CamelDeletedAt;
use App\Models\Traits\CamelTimestamps;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $uuid
 * @property int $transactionTotal
 * @property string $transactionStatus
 * @property string $transactionProof
 * @property Customer $customer
 * @property TransactionDetail $transactionDetail
 */
class Transaction extends Model
{
    use HasUuids;
    use CamelTimestamps;
    use CamelDeletedAt;

    protected $fillable = [
        'customer_id','customerId',
        'transaction_total','transactionTotal',
        'transaction_status','transactionStatus',
        'transaction_proof', 'transactionProof'
    ];

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function transactionDetail(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function customerId(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['customer_id'],
            set: fn($value, $attributes) => ['customer_id' => $value]
        );
    }
    
    public function transactionTotal(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['transaction_total'],
            set: fn($value, $attributes) => ['transaction_total' => $value]
        );
    }
    
    public function transactionStatus(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['transaction_status'],
            set: fn($value, $attributes) => ['transaction_status' => $value]
        );
    }
    
    public function transactionProof(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => asset('/storage/' .  $attributes['transaction_proof']),
            set: fn($value, $attributes) => ['transaction_proof' => $value]
        );
    }
}
