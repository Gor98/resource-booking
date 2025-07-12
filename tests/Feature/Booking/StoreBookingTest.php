<?php

namespace Feature\Booking;

use App\Modules\Auth\Models\User;
use App\Modules\Booking\Models\Booking;
use App\Modules\Resource\Models\Resource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;


/**
 * Class StoreBookingTest
 * @package Tests\Feature\Booking
 */
class StoreBookingTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @return void
     */
    public function testBookSuccess()
    {
        $resource = Resource::factory()->create();
        $user = User::factory()->create();
        $response = $this->postJson(route('bookings.store'), [
            'resource_id' => $resource->id,
            'user_id' => $user->id,
            'start_time' => now()->addMinutes(1)->format('Y-m-d H:i:s'),
            'end_time' => now()->addMinutes(5)->format('Y-m-d H:i:s'),
        ]);
        $response->assertJsonStructure([
            'data',
            'message',
            'data',
        ]);
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @dataProvider failDataProvider
     * * @return void
     */
    public function testStoreFail(array $data)
    {
        $response = $this->postJson(route('bookings.store', $data));
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function testStoreFailReservedBooking()
    {
        $resource = Resource::factory()->create();
        $user = User::factory()->create();
        $booking = Booking::factory()->create(
            [
                'resource_id' => $resource->id,
                'start_time' => '2025-10-03 11:00:00',
                'end_time' => '2025-10-03 15:00:00',
            ]
        );
        $response = $this->postJson(route('bookings.store', [
            'resource_id' => $resource->id,
            'user_id' => $user->id,
            'start_time' => '2025-10-03 12:00:00',
            'end_time' => '2025-10-03 16:00:00',
        ]));
        $response->assertStatus(Response::HTTP_CONFLICT);
        $response->assertJson([
            'message' => 'The resource is already booked for this time slot.',
        ]);
    }

    /**
     * @return array[]
     */
    public static function failDataProvider(): array
    {
        return [
            [['resource_id' => '', 'user_id' => '', 'start_time' => '', 'end_time' => '']],
            [['resource_id' => 1, 'user_id' => 1, 'start_time' => '2025-10-03 11:00:00', 'end_time' => '2025-10-03 10:00:00']],
            [['resource_id' => 1, 'user_id' => 1, 'start_time' => '2025-10-03 11:00:00', 'end_time' => '']],
            [[]],
        ];
    }
}
