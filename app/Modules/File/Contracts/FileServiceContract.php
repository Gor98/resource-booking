<?php

namespace App\Modules\File\Contracts;

use App\Modules\File\Models\File;
use App\Modules\File\Requests\AddFileRequest;
use Illuminate\Http\UploadedFile;

/**
 * Interface FileServiceContract
 * @package App\Modules\Product\Contracts
 */
interface FileServiceContract
{
    /**
     * @param AddFileRequest $request
     * @return File
     */
    public function upload(AddFileRequest $request): File;

    /**
     * @param File $file
     * @return void
     */
    public function remove(File $file): void;
}
