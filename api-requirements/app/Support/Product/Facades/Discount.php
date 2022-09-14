<?php

namespace CodeHappy\Support\Product\Facades;

use Illuminate\Support\Facades\Facade;

class Discount extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'discount';
    }
}
