<?php

namespace Feature\Product;

use App\Modules\Product\Models\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;


/**
 * Class GetProductsTest
 * @package Tests\Feature\Product
 */
class GetProductsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @return void
     */
    public function testGetProductListSuccess()
    {
        Product::factory()->create();
        $response = $this->getJson(route('products.all'));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'price',
                    'description',
                    'is_favorite',
                    'category' => [
                        'id',
                        'name',
                    ],
                    'images' => [
                        '*' => [
                            "id",
                            "fileable_type",
                            "fileable_id",
                            "full_path",
                            "type",
                            "name"
                        ]
                    ],
                ]
            ]
        ]);
    }

    // TODO more tests ....
}
