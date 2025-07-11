<?php

namespace Database\Factories\Modules\Resource\Models;

use App\Modules\Resource\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class ResourceFactory
 * @package Database\Factories
 */
class ResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'type' => Resource::TYPES[random_int(0, 1)],
            'description' => $this->faker->text(),
        ];
    }
}
