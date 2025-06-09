<?php


namespace App\Modules\File\Repositories;

use App\Common\Bases\Repository;
use App\Modules\File\Models\File;

/**
 * Class FileRepository
 * @package App\Modules\File\Repositories
 */
class FileRepository extends Repository
{
    /**
     * @var array
     */
    protected array $fillable = [
        'full_path',
        'path',
        'name',
        'type',
        'fileable_type',
        'fileable_id',
    ];

    /**
     * @return string
     */
    protected function model(): string
    {
        return File::class;
    }
}
