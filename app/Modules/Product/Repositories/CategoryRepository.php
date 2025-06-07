<?php


namespace App\Modules\Product\Repositories;

use App\Common\Bases\Repository;
use App\Modules\Product\Models\Category;

/**
 * Class CategoryRepository
 * @package App\Modules\Product\Repositories
 */
class CategoryRepository extends Repository
{
    /**
     * @var array
     */
    protected array $fillable = [
        'name',
    ];

    /**
     * @return string
     */
    protected function model(): string
    {
        return Category::class;
    }
}
