<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use CodeHappy\Domain\Product\Database\Seeders\ProductSeeder;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(ProductSeeder::class);
});

it('provides a single endpoint. GET /products.', function () {
    $response = $this->json('GET', '/products')
        ->assertStatus(200);
    $jsonResponse = json_decode($response->getContent(), true);
    $this->assertCount(5, $jsonResponse['data']);
    $this->assertArrayHasKey('sku', $jsonResponse['data'][0]);
    $this->assertArrayHasKey('name', $jsonResponse['data'][0]);
    $this->assertArrayHasKey('category', $jsonResponse['data'][0]);
    $this->assertArrayHasKey('price', $jsonResponse['data'][0]);
});

it('can be filtered by category as a query string parameter.', function () {
    $response = $this->json('GET', '/products?filter[category]=insurance')
        ->assertStatus(200);
    $jsonResponse = json_decode($response->getContent(), true);
    $this->assertCount(2, $jsonResponse['data']);

});

it('can be filtered by price as a query string parameter, this filter applies before discounts are applied.', function () {
    $response = $this->json('GET', '/products?filter[price]=89000')
        ->assertStatus(200);
    $jsonResponse = json_decode($response->getContent(), true);
    $this->assertCount(1, $jsonResponse['data']);
});

it('returns a list of Products with the given discounts applied when necessary Product model.', function () {
    $response = $this->json('GET', '/products')
        ->assertStatus(200);
    $jsonResponse = json_decode($response->getContent(), true);
    expect($jsonResponse['data'][0]['price'])->toBe([
        'original' => 89000,
        'final' => 62300,
        'discount_percentage' => '30%',
        'currency' => 'EUR',
    ]);
});

test('when a product does not have a discount, price.final and price.original should be the same number and discount_percentage should be null.', function () {
    $response = $this->json('GET', '/products?filter[price]=250000')
        ->assertStatus(200);
    $jsonResponse = json_decode($response->getContent(), true);
    $this->assertCount(1, $jsonResponse['data']);
    expect($jsonResponse['data'][0]['price']['discount_percentage'])->toBeNull();
});

test('when a product has a discount, price.original is the original price, price.final is the amount with the discount applied and discount_percentage represents the applied discount with the % sign.', function () {
    $response = $this->json('GET', '/products?filter[category]=vehicle')
        ->assertStatus(200);
    $jsonResponse = json_decode($response->getContent(), true);
    $this->assertCount(3, $jsonResponse['data']);
    expect($jsonResponse['data'][1]['price']['final'])->toBe(127500);
    expect($jsonResponse['data'][1]['price']['discount_percentage'])->toBe('15%');
});
