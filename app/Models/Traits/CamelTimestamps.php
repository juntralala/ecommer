<?php

namespace App\Models\Traits;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait CamelTimestamps
{
    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['created_at'],
            set: fn($value) => ['created_at' => $value] 
        );
    }

    public function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['updated_at'],
            set: fn($value) => ['updated_at' => $value] 
        );
    }
}
