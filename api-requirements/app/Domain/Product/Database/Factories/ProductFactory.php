<?php

namespace CodeHappy\Domain\Product\Database\Factories;

use CodeHappy\Support\Product\Enum\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Domain\Product\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sku' => fake()->unique()->numberBetween(6, 99999),
            'name' => fake()->name(),
            'category' => fake()->randomElement(Category::toValues()),
            'price' => intval(fake()->unique()->numberBetween(1, 99) . '000'),
        ];
    }
}
