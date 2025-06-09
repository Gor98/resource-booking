<?php

namespace App\Modules\File\Controllers;

use App\Common\Bases\Controller;
use App\Common\Tools\APIResponse;
use App\Modules\File\Contracts\FileServiceContract;
use App\Modules\File\Models\File;
use App\Modules\File\Requests\AddFileRequest;
use App\Modules\File\Resources\FileResource;
use Illuminate\Http\JsonResponse;

/**
 * Class FileController extends Controller

 * @package App\Modules\File\Controllers
 */
class FileController extends Controller
{
    public function __construct(protected FileServiceContract $fileService)
    {
    }

    /**
     * @param AddFileRequest $request
     * @return JsonResponse
     */
    public function upload(AddFileRequest $request): JsonResponse
    {
        return APIResponse::successResponse(new FileResource(
            $this->fileService->upload($request)
        ));
    }

    /**
     * @param File $file
     * @return JsonResponse
     */
    public function remove(File $file): JsonResponse
    {
        $this->fileService->remove($file);

        return APIResponse::successResponse([]);
    }

}
