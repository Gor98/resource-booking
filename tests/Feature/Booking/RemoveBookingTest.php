<?php

namespace Feature\Booking;

use App\Modules\Booking\Models\Booking;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;


/**
 * Class StoreResourceTest
 * @package Tests\Feature\Resource
 */
class RemoveBookingTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @return void
     */
    public function testDeleteSuccess()
    {
        $booking = Booking::factory()->create();
        $response = $this->deleteJson(route('bookings.remove', ['booking' => $booking->id]));
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    /**
     * * @return void
     */
    public function testRemoveFail()
    {
        $response = $this->deleteJson(route('bookings.remove', ['booking' => 9999999]));
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
