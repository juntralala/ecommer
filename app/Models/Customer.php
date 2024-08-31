<?php

namespace App\Models;

use App\Models\Traits\CamelDeletedAt;
use App\Models\Traits\CamelTimestamps;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $customerName
 * @property string $customerOptional
 * @property string $address
 * @property string $number
 * @property \Illuminate\Support\Carbon $deletedAt
 * @property string $rememberToken
 * @property \Illuminate\Support\Carbon $createdAt
 * @property \Illuminate\Support\Carbon $updatedAt
 * @property Transaction $transactions
 */
class Customer extends Model
{
    use HasApiTokens;
    use SoftDeletes;
    use CamelTimestamps;
    use CamelDeletedAt;

    protected $fillable = [
        'customer_name', 'customerName',
        'customer_optional', 'customerOptional',
        'email',
        'password',
        'address',
        'number'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function transactions(): HasMany {
        return $this->hasMany(Transaction::class, 'customer_id', 'id');
    }

    public function customerName(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['customer_name'],
            set: fn($value) => ['customer_name' => $value] 
        );
    }

    public function customerOptional(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['customer_optional'],
            set: fn($value) => ['customer_optional' => $value] 
        );
    }

    public function rememberToken(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['remember_token'],
            set: fn($value) => ['remember_token' => $value] 
        );
    }
}
