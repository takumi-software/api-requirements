<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'sku',
        'name',
        'category',
        'price',
        'discount',
    ];

    protected $casts = [
        'price' => 'int',
        'discount' => 'float',
    ];

    public function currency() : Attribute
    {
        return Attribute::make(
          get: fn($value) => 'EUR',
        );
    }

    public function finalPrice() : Attribute
    {
        return Attribute::make(
            get: function($value) {
                return is_null($this->discount)?
                    $this->price : ($this->price - ($this->price * $this->discount));
            },
        );
    }

    public function discountedPercentage() : Attribute
    {
        return Attribute::make(
            get: function($value) {
                return is_null($this->discount)?
                    null : (($this->discount * 100) . '%');
            },
        );
    }


}
