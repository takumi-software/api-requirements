<?php

use CodeHappy\Support\Product\Facades\Discount;

it('should show the discount label', function ($discount, $label) {
    expect(Discount::label($discount))->toBe($label);
})->with('discounts');

