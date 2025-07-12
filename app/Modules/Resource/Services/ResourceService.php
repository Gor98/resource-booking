<?php

namespace App\Modules\Resource\Services;

use App\Common\Bases\Service;
use App\Common\Exceptions\RepositoryException;
use App\Modules\Resource\Contracts\ResourceServiceContract;
use App\Modules\Resource\Models\Resource;
use App\Modules\Resource\Repositories\ResourceRepository;
use App\Modules\Resource\Requests\ResourceRequest;
use App\Modules\Resource\Requests\StoreResourceRequest;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ResourceService
 * @package App\Modules\Resource\Services
 */
class ResourceService extends Service implements ResourceServiceContract
{
    /**
     * @param ResourceRepository $resourceRepository
     */
    public function __construct(protected ResourceRepository $resourceRepository)
    {
    }

    /**
     * @param StoreResourceRequest $request
     * @return Resource
     * @throws RepositoryException
     */
    public function store(StoreResourceRequest $request): Resource
    {
        return $this->resourceRepository->create($request->all());
    }

    /**
     * @param ResourceRequest $request
     * @return LengthAwarePaginator
     * @throws RepositoryException
     */
    public function all(ResourceRequest $request): LengthAwarePaginator
    {
        return $this->resourceRepository->sortPaginate(
            [],
            [],
            $request->only(['orderType', 'orderBy', 'perPage'])
        );
    }

    /**
     * @param Resource $resource
     * @return Resource
     */
    public function show(Resource $resource): Resource
    {
        return $resource->load('bookings');
    }
}
