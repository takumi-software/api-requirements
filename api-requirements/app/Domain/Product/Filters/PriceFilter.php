<?php

namespace CodeHappy\Domain\Product\Filters;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

/**
 * Can be filtered by price as a query string parameter,
 * this filter applies AFTER discounts are applied.
 *
 * Just if you need to filter by the final price.
 */
class PriceFilter implements Filter
{
    /** @const string */
    protected const BETWEEN_SEPARATOR = '..';

    /**
     * Filter by prices
     *
     * @param Builder $query
     * @param mixed $value
     * @param string $property
     * @return void
     */
    public function __invoke(Builder $query, $value, string $property)
    {
        $operator = '=';
        $values = $value;
        if (strpos($value, self::BETWEEN_SEPARATOR) !== false) {
            $operator = 'BETWEEN';
            list($startsAt, $endsAt) = explode(self::BETWEEN_SEPARATOR, $value);
            $values = "{$startsAt} AND {$endsAt}";
        }

        $query->whereRaw("
            IF(
                category='insurance',
                price*0.7,
                IF(sku='000003', price*0.85, price)
            )
            {$operator}
            {$values}
        ");
    }
}
