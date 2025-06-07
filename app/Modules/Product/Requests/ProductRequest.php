<?php


namespace App\Modules\Product\Requests;

use App\Common\Bases\BaseRequest;

/**
 * Class LoginRequest
 * @package App\Modules\Auth\Requests
 */
class ProductRequest extends BaseRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'orderType' =>  'sometimes|in:asc,desc',
            'orderBy' =>  'sometimes|in:id,created_at',
            'perPage' =>  'sometimes|numeric',
        ];
    }

}
