<?php


namespace App\Modules\Product\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProductResource
 * @package App\Modules\Product\Resources
 */
class ProductResource extends JsonResource
{
    /**
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'is_favorited' => auth()->check()
                ? $this->favorite->contains(auth()->id())
                : false,
            'category' => new CategoryResource($this->category),
        ];
    }
}
