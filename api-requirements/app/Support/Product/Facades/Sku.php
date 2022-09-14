<?php

namespace CodeHappy\Support\Product\Facades;

use Illuminate\Support\Facades\Facade;

class Sku extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sku';
    }
}
