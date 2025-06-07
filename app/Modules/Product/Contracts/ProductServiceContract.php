<?php

namespace App\Modules\Product\Contracts;

use App\Modules\Product\Models\Product;
use App\Modules\Product\Requests\FavoriteRequest;
use App\Modules\Product\Requests\ProductRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface ProductServiceContract
 * @package App\Modules\Product\Contracts
 */
interface ProductServiceContract
{
    /**
     * @param ProductRequest $request
     * @return LengthAwarePaginator
     */
    public function all(ProductRequest $request): LengthAwarePaginator;

    /**
     * @param FavoriteRequest $request
     * @return Product
     */
    public function addFavorite(FavoriteRequest $request): Product;

    /**
     * @param FavoriteRequest $request
     * @return void
     */
    public function removeFavorite(Product $product): void;

    /**
     * @return Collection
     */
    public function categories(): Collection;
}
