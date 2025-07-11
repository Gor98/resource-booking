<?php


namespace App\Modules\Booking\Requests;

use App\Common\Bases\BaseRequest;

/**
 * Class StoreBookingRequest
 * @package App\Modules\Booking\Requests
 */
class StoreBookingRequest extends BaseRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'user_id' =>  'required|exists:users,id',
            'resource_id' =>  'required|exists:resources,id',
            'start_time' =>  'required|date|after:now|before:end_time|date_format:Y-m-d H:i:s',
            'end_time' =>  'required|date|after:now|after:start_time|date_format:Y-m-d H:i:s',
        ];
    }
}
