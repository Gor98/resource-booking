<?php

namespace App\Modules\Product\Services;

use App\Common\Bases\Service;
use App\Common\Exceptions\RepositoryException;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Repositories\CategoryRepository;
use App\Modules\Product\Repositories\ProductRepository;
use App\Modules\Product\Contracts\ProductServiceContract;
use App\Modules\Product\Requests\FavoriteRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Product\Requests\ProductRequest;

/**
 * Class ProductService
 * @package App\Modules\Product\Services
 */
class ProductService extends Service implements ProductServiceContract
{
    public function __construct(
        protected ProductRepository $productRepository,
        protected CategoryRepository $categoryRepository
    ) {

    }

    /**
     * @throws RepositoryException
     */
    public function all(ProductRequest $request): LengthAwarePaginator
    {
       return $this->productRepository->sortPaginate(
           [],
           ['category', 'favorite'],
           $request->only(['orderType', 'orderBy', 'perPage'])
       );
    }

    /**
     * @return Collection
     * @throws RepositoryException
     */
    public function categories(): Collection
    {
        return $this->categoryRepository->all();
    }

    /**
     * @param FavoriteRequest $request
     * @return Product
     * @throws RepositoryException
     */
    public function addFavorite(FavoriteRequest $request): Product
    {
        $product = $this->productRepository->find($request->input('product_id'));
        $user = auth()->user();

        if (! $this->productRepository->isFavorite($user, $request->integer('product_id'))) {
            $this->productRepository->addFavorite($user, $request->integer('product_id'));
        }

        return $product;
    }

    /**
     * @param Product $product
     * @return void
     */
    public function removeFavorite(Product $product): void
    {
        $user = auth()->user();

        if ($this->productRepository->isFavorite($user, $product->id)) {
            $this->productRepository->removeFavorite($user, $product->id);
        }
    }

    /**
     * @throws RepositoryException
     */
    public function favorites(ProductRequest $request): LengthAwarePaginator
    {
        return $this->productRepository->sortPaginate(
            ['favoritedBy' => auth()->id()],
            ['category'],
            $request->only(['orderType', 'orderBy', 'perPage'])
        );
    }
}
