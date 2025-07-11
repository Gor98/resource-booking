<?php


namespace App\Modules\Resource\Requests;

use App\Common\Bases\BaseRequest;

/**
 * Class ResourceRequest
 * @package App\Modules\Resource\Requests
 */
class ResourceRequest extends BaseRequest
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
