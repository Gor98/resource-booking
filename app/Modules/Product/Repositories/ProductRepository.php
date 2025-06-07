<?php


namespace App\Modules\Product\Repositories;

use App\Common\Bases\Repository;
use App\Modules\Auth\Models\User;
use App\Modules\Product\Models\Product;

/**
 * Class ProductRepository
 * @package App\Modules\Product\Repositories
 */
class ProductRepository extends Repository
{
    /**
     * @var array
     */
    protected array $fillable = [
        'name',
        'description',
        'price',
        'category_id'
    ];

    /**
     * @return string
     */
    protected function model(): string
    {
        return Product::class;
    }

    public function isFavorite(User $user, int $productId): bool
    {
        return $user->favorites()->where('product_id', $productId)->exists();
    }

    public function addFavorite(User $user, int $productId): void
    {
        $user->favorites()->attach($productId);
    }

    public function removeFavorite(User $user, int $productId): void
    {
        $user->favorites()->detach($productId);
    }
}
