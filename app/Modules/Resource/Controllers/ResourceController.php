<?php


namespace App\Modules\Resource\Controllers;

use App\Common\Bases\Controller;
use App\Common\Tools\APIResponse;
use App\Modules\Resource\Contracts\ResourceServiceContract;
use App\Modules\Resource\Models\Resource;
use App\Modules\Resource\Requests\ResourceRequest;
use App\Modules\Resource\Requests\StoreResourceRequest;
use App\Modules\Resource\Resources\ResourceResource;
use Illuminate\Http\JsonResponse;


/**
 * Class ResourceController
 * @package App\Modules\Resource\Controllers
 */
class ResourceController extends Controller
{
    /**
     * @param ResourceServiceContract $resourceService
     */
    public function __construct(protected ResourceServiceContract $resourceService)
    {
    }

    /**
     * @param StoreResourceRequest $request
     * @return JsonResponse
     */
    public function store(StoreResourceRequest $request): JsonResponse
    {
        return APIResponse::successResponse(new ResourceResource($this->resourceService->store($request)));
    }

    /**
     * @param ResourceRequest $request
     * @return JsonResponse
     */
    public function index(ResourceRequest $request): JsonResponse
    {
        return APIResponse::collectionResponse(ResourceResource::collection($this->resourceService->all($request)));
    }

    /**
     * @param Resource $resource
     * @return JsonResponse
     */
    public function bookings(Resource $resource): JsonResponse
    {
        return APIResponse::successResponse(new ResourceResource($this->resourceService->show($resource)));
    }
}
