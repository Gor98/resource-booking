<?php


namespace App\Modules\Product\Controllers;

use App\Common\Bases\Controller;
use App\Common\Tools\APIResponse;
use App\Modules\Product\Contracts\ProductServiceContract;
use App\Modules\Product\Resources\CategoryResource;
use Illuminate\Http\JsonResponse;


/**
 * Class CategoryController
 * @package App\Modules\Product\Controllers
 */
class CategoryController extends Controller
{
    /**
     * @param ProductServiceContract $productServiceContract
     * @return JsonResponse
     */
    public function __invoke(ProductServiceContract $productServiceContract): JsonResponse
    {
        return APIResponse::successResponse(CategoryResource::collection(
            $productServiceContract->categories()
        ));
    }
}
