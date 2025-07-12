<?php

namespace Feature\Resource;

use App\Modules\Resource\Models\Resource;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;


/**
 * Class GetResourceTest
 * @package Tests\Feature\Resource
 */
class GetResourceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @return void
     */
    public function testGetResourcesSuccess()
    {
        $resource = Resource::factory(5)->create();
        $response = $this->getJson(route('resources.index'));
        $response->assertJsonStructure([
            'data',
            'message',
            'pagination',
        ]);
        $response->assertStatus(Response::HTTP_OK);
    }
}
