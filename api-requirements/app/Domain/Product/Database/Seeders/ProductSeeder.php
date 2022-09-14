<?php

namespace CodeHappy\Domain\Product\Database\Seeders;

use CodeHappy\Domain\Product\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $dataset = $this->getDataset();
        foreach ($dataset as $product) {
            Product::create($product);
        }
    }

    /**
     * Get dataset.
     *
     * @return array
     */
    protected function getDataset(): array
    {
        $jsonData = file_get_contents(resource_path('json/dataset.json'));
        return json_decode($jsonData, true)['products'];
    }
}
