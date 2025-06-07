<?php

namespace Database\Factories\Modules\Product\Models;

use App\Modules\Product\Models\Product;
use App\Modules\Product\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class UserFactory
 * @package Database\Factories
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 5, 100),
            'stock' => fake()->numberBetween(5, 100),
            'category_id' => Category::factory(),
        ];
    }

}
