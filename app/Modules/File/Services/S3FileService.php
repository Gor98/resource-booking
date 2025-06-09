<?php

namespace App\Modules\File\Services;

use App\Common\Exceptions\RepositoryException;
use App\Modules\File\Models\File;
use App\Modules\File\Repositories\FileRepository;
use App\Modules\File\Requests\AddFileRequest;
use App\Modules\Product\Repositories\ProductRepository;
use Illuminate\Filesystem\FilesystemManager;

/**
 * Class S3FileService
 * @package App\Modules\File\Services
 */
class S3FileService extends FileService
{
    protected string $disk = 's3';

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
        $file = $request->file('file');
        $path = $this->filesystem
            ->disk($this->disk)
            ->putFile('', $file);

        return $this->fileRepository->create($this->prepareFileData(
            $path,
            $product::class,
            $product->getKey(),
            $file->getClientOriginalName(),
        ));
    }
}
