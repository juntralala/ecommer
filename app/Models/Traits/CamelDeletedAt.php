<?php

namespace App\Models\Traits;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait CamelDeletedAt
{
    public function deletedAt(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['deleted_at'],
            set: fn($value) => ['deleted_at' => $value] 
        );
    }
}
