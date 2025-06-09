<?php


namespace App\Modules\File\Requests;

use App\Common\Bases\BaseRequest;

/**
 * Class AddFileRequest
 * @package App\Modules\File\Requests
 */
class AddFileRequest extends BaseRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'file' => 'required|file',
            'product_id' => 'required|exists:products,id',
        ];
    }

}
