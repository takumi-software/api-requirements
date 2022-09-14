<?php

namespace CodeHappy\Support\Product\Helpers;

class Sku
{
    /**
     * Formats sku code with leading zeros.
     *
     * @param integer $code
     * @return string
     */
    public function label(int $code): string
    {
        return sprintf('%06d', $code);
    }
}
