<?php

namespace App\Modules\Resource\Contracts;

use App\Modules\Resource\Models\Resource;
use App\Modules\Resource\Requests\ResourceRequest;
use App\Modules\Resource\Requests\StoreResourceRequest;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface ResourceServiceContract
 * @package App\Modules\Resource\Contracts
 */
interface ResourceServiceContract
{
    /**
     * @param StoreResourceRequest $request
     * @return Resource
     */
    public function store(StoreResourceRequest $request): Resource;

    /**
     * @param Resource $resoruce
     * @return Resource
     */
    public function show(Resource $resoruce): Resource;

    /**
     * @param ResourceRequest $request
     * @return LengthAwarePaginator
     */
    public function all(ResourceRequest $request): LengthAwarePaginator;
}
