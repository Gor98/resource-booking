<?php


namespace App\Modules\Product\Controllers;

use App\Common\Bases\Controller;
use App\Common\Tools\APIResponse;
use App\Modules\Product\Contracts\ProductServiceContract;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Requests\FavoriteRequest;
use App\Modules\Product\Resources\ProductResource;
use App\Modules\Product\Requests\ProductRequest;
use Illuminate\Http\JsonResponse;

/**
 * Class ProductController
 * @package App\Modules\Product\Controllers
 */
class ProductController extends Controller
{
    /**
     * @param ProductServiceContract $productServiceContract
     */
    public function __construct(Protected ProductServiceContract $productServiceContract)
    {
    }

    /**
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function all(ProductRequest $request): JsonResponse
    {
        return APIResponse::collectionResponse(ProductResource::collection(
            $this->productServiceContract->all($request)
        ));
    }

    /**
     * @param FavoriteRequest $request
     * @return JsonResponse
     */
    public function AddFavorite(FavoriteRequest $request): JsonResponse
    {
        return APIResponse::successResponse(new ProductResource(
            $this->productServiceContract->addFavorite($request)
        ));
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function removeFavorite(Product $product): JsonResponse
    {
        $this->productServiceContract->removeFavorite($product);

        return APIResponse::successResponse([]);
    }

    /**
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function favorites(ProductRequest $request): JsonResponse
    {
        return APIResponse::collectionResponse(ProductResource::collection(
            $this->productServiceContract->favorites($request)
        ));
    }
}
