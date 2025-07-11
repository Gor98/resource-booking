<?php


namespace App\Modules\Resource\Repositories;

use App\Common\Bases\Repository;
use App\Modules\Resource\Models\Resource;

/**
 * Class ResourceRepository
 * @package App\Modules\Resource\Repositories
 */
class ResourceRepository extends Repository
{
    /**
     * @var array
     */
    protected array $fillable = [
        'name',
        'type',
        'description'
    ];

    /**
     * @return string
     */
    protected function model(): string
    {
        return Resource::class;
    }
}
