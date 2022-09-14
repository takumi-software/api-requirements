<?php

namespace CodeHappy\Domain\Product\Concerns;

use CodeHappy\Domain\Product\Models\Product;
use CodeHappy\Support\Product\Enum\Category;

trait GivesDiscounts
{
    /**
     * Get discount.
     *
     * Rules:
     * - Products in the "insurance" category have a 30% discount.
     * - The product with sku = 000003 has a 15% discount.
     *
     * @param Product $product
     * @return float
     */
    public function getDiscount(Product $product): float
    {
        if ($product->category->equals(Category::insurance())) {
            return 0.7;
        }
        if ($product->sku === '000003') {
            return 0.85;
        }
        return 1;
    }
}
