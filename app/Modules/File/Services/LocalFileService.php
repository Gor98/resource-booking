<?php

namespace App\Modules\File\Services;

use App\Common\Exceptions\RepositoryException;
use App\Modules\File\Models\File;
use App\Modules\File\Repositories\FileRepository;
use App\Modules\File\Requests\AddFileRequest;
use App\Modules\Product\Repositories\ProductRepository;
use Illuminate\Filesystem\FilesystemManager;

/**
 * Class LocalFileService
 * @package App\Modules\File\Services
 */
class LocalFileService extends FileService
{
    protected string $disk = 'local';

    public function __construct(
        protected FileRepository $fileRepository,
        protected ProductRepository $productRepository,
        protected FilesystemManager $filesystem
    ) {

    }

    /**
     * @param AddFileRequest $request
     * @return File
     * @throws RepositoryException
     */
    public function upload(AddFileRequest $request): File
    {
        $product = $this->productRepository->find($request->input('product_id'));
        $path = $request->file('file')->store('', 'local');

        return $this->fileRepository->create($this->prepareFileData(
            $path,
            $product::class,
            $product->getKey(),
            $request->file('file')->getClientOriginalName(),
        ));
    }
}
