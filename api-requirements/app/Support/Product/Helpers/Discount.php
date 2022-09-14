<?php

namespace CodeHappy\Support\Product\Helpers;

class Discount
{
    /**
     * Formats discount value.
     *
     * - When a product does not have a discount, price.final and price.original
     *   should be the same number and discount_percentage should be null.
     *
     * @param float $discount
     * @return string|null
     */
    public function label(float $discount): ?string
    {
        if (intval($discount) === 1) {
            return null;
        }

        return sprintf('%d', (1 - $discount) * 100) . '%';
    }
}
