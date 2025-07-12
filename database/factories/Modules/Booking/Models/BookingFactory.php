<?php

namespace Database\Factories\Modules\Booking\Models;

use App\Modules\Auth\Models\User;
use App\Modules\Booking\Models\Booking;
use App\Modules\Resource\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class BookingFactory
 * @package Database\Factories
 */
class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start = $this->faker->dateTimeBetween('+1 hour', '+1 day');
        $end = (clone $start)->modify('+1 hour');

        return [
            'resource_id' => Resource::factory(),
            'user_id' => User::factory(),
            'start_time' => $start->format('Y-m-d H:i:s'),
            'end_time' => $end->format('Y-m-d H:i:s'),
        ];
    }
}
