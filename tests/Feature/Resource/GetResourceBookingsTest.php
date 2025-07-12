<?php

namespace Tests\Feature\Resource;

use App\Modules\Booking\Models\Booking;
use App\Modules\Resource\Models\Resource;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;


/**
 * Class GetResourceBookingsTest
 * @package Tests\Feature\Resource
 */
class GetResourceBookingsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @return void
     */
    public function testGetResourcesBookingsSuccess()
    {
        $resource = Resource::factory()->create();
        $booking = Booking::factory(5)->create(['resource_id' => $resource->id]);
        $response = $this->getJson(route('resources.bookings', ['resource' => $resource->id]));
        $response->assertJsonStructure([
            'data' => ['id', 'type', 'description', 'bookings'],
            'status',
            'message',
        ]);
        $response->assertStatus(Response::HTTP_OK);
    }
}
