<?php

namespace App\Modules\Product\Models;

use App\Modules\Auth\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Product
 * @package App\Modules\Product\Models
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id'
    ];

    /**
     * One product belongs to one category.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Users who have favorited this product.
     */
    public function favorite()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function scopeFavoritedBy(Builder $query, int $userId): Builder
    {
        return $query->whereHas('favorite', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        });
    }
}

