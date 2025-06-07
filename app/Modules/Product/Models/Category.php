<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 * @package App\Modules\Product\Models
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * One category has many products.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}

