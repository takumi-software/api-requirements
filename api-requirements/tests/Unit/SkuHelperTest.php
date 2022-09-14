<?php

use CodeHappy\Support\Product\Facades\Sku;

it('should format the sku when integer', function ($sku, $formatted) {
    expect(Sku::label($sku))->toBe($formatted);
})->with('skus');
