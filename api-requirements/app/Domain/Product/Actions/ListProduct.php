<?php

namespace CodeHappy\Domain\Product\Actions;

// use CodeHappy\Domain\Product\Filters\PriceFilter;
use CodeHappy\Domain\Product\Models\Product;
use Illuminate\Support\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListProduct
{
    /**
     * List products.
     *
     * - Can be filtered by category as a query string parameter.
     * - Can be filtered by price as a query string parameter,
     *   this filter applies before discounts are applied.
     *
     * @return Collection
     * @example GET /products?filter[category]=insurance&filter[price]=89000
     */
    public function execute(): Collection
    {
        return QueryBuilder::for(Product::class)
            ->allowedFilters([
                AllowedFilter::exact('category'),
                AllowedFilter::exact('price'),
            ])
            ->get();
    }
}
