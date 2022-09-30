<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'sku' => '000001',
            'name' => 'Full coverage insurance',
            'category' => 'insurance',
            'price' => 89000,
            'discount' => 0.3,
        ]);

        Product::create([
            'sku' => '000002',
            'name' => 'Compact Car X3',
            'category' => 'vehicle',
            'price' => 99000,
            'discount' => null,
        ]);

        Product::create([
            'sku' => '000003',
            'name' => 'SUV Vehicle, high end',
            'category' => 'vehicle',
            'price' => 150000,
            'discount' => 0.15,
        ]);

        Product::create([
            'sku' => '000004',
            'name' => 'Basic coverage',
            'category' => 'insurance',
            'price' => 20000,
            'discount' => 0.3,
        ]);

        Product::create([
            'sku' => '000005',
            'name' => 'Convertible X2, Electric',
            'category' => 'vehicle',
            'price' => 250000,
            'discount' => null,
        ]);
    }
}
