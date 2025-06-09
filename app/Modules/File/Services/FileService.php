<?php

namespace App\Modules\File\Services;

use App\Common\Bases\Service;
use App\Modules\File\Contracts\FileServiceContract;
use App\Modules\File\Models\File;
use App\Modules\File\Repositories\FileRepository;

/**
 * Class FileService
 * @package App\Modules\File\Services
 */
abstract class FileService extends Service implements FileServiceContract
{
    /**
     * @param File $file
     * @return void
     * @throws \Exception
     */
    public function remove(File $file): void
    {
        $disk = $this->filesystem->disk($this->disk);

        if ($disk->exists($file->path)) {
            $disk->delete($file->path);
        }

        $this->fileRepository->delete($file);
    }

    /**
     * @param $path
     * @param $source
     * @param $source_id
     * @param $name
     * @return array
     */
    protected function prepareFileData($path, $source, $source_id, $name): array
    {
        return [
            'full_path' =>  storage_path('app/private/' . $path),
            'path' =>  $path,
            'name' =>  $name,
            'fileable_type' => $source,
            'fileable_id' => $source_id,
        ];
    }
}
