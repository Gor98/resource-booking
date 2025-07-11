<?php

namespace Feature\Resource;

use App\Modules\Resource\Models\Resource;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;


/**
 * Class StoreResourceTest
 * @package Tests\Feature\Resource
 */
class StoreResourceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @dataProvider successDataProvider
     * @return void
     */
    public function testStoreSuccess(array $data)
    {
        $resource = Resource::factory()->create();
        $response = $this->postJson(route('resources.store', $data));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure([
            'data',
            'message',
            'data',
        ]);
    }

    /**
     * @dataProvider failDataProvider
     * * @return void
     */
    public function testStoreFail(array $data)
    {
        $resource = Resource::factory()->create();
        $response = $this->postJson(route('resources.store', $data));
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @return array[]
     */
    public static function failDataProvider(): array
    {
        return [
            [['name' => '', 'type' => Resource::TYPES[0], 'description' => '']],
            [['name' => 'test', 'type' => '', 'description' => '']],
            [['name' => 'test', 'type' => 'ko ko', 'description' => '']],
            [[]],
        ];
    }

    /**
     * @return array[]
     */
    public static function successDataProvider(): array
    {
        return [
            [['name' => 'test 1', 'type' => Resource::TYPES[0], 'description' => '']],
            [['name' => 'test 2', 'type' => Resource::TYPES[1], 'description' => 'some text ']],
        ];
    }
}
