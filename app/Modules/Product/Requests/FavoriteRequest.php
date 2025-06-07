<?php


namespace App\Modules\Product\Requests;

use App\Common\Bases\BaseRequest;

/**
 * Class LoginRequest
 * @package App\Modules\Auth\Requests
 */
class FavoriteRequest extends BaseRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'product_id' =>  'required|exists:products,id',
        ];
    }

}
