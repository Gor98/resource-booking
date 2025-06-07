<?php

namespace Database\Factories\Modules\Product\Models;

use App\Modules\Product\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class CategoryFactory
 * @package Database\Factories
 */
class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->word(),
        ];
    }
}
