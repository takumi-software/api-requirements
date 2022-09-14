<?php

namespace CodeHappy\Domain\Product\Presenters;

use CodeHappy\Domain\Product\Concerns\GivesDiscounts;
use CodeHappy\Support\Product\Facades\Discount;
use Laracasts\Presenter\Presenter;

class ProductPresenter extends Presenter
{
    use GivesDiscounts;

    /**
     * price.currency is always EUR.
     *
     * @return array
     */
    public function priceDetails(): array
    {
        $originalPrice = $this->price;
        $discount = $this->getDiscount($this->entity);
        return [
            'original' => $originalPrice,
            'final' => round($originalPrice * $discount),
            'discount_percentage' => Discount::label($discount),
            'currency' => config('app.currency'),
        ];
    }
}
