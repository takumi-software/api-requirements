<?php

namespace CodeHappy\Domain\Product\Models;

use CodeHappy\Domain\Product\Presenters\ProductPresenter;
use CodeHappy\Support\Product\Enum\Category;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Product extends Model
{
    use PresentableTrait;

    /** @var string  */
    protected $presenter = ProductPresenter::class;

    /** @var bool Disable timestamps. */
    public $timestamps = false;

    /** @var array The attributes that should be cast. */
    protected $casts = [
        'category' => Category::class,
        'price' => 'int',
    ];
}
