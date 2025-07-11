<?php


namespace App\Modules\Resource\Requests;

use App\Common\Bases\BaseRequest;
use App\Modules\Resource\Models\Resource;

/**
 * Class ResourceRequest
 * @package App\Modules\Resource\Requests
 */
class StoreResourceRequest extends BaseRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|in:' . $this->implode(Resource::TYPES),
        ];
    }

}
