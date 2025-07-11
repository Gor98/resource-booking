<?php


namespace App\Modules\Booking\Requests;

use App\Common\Bases\BaseRequest;

/**
 * Class RemoveBookingRequest
 * @package App\Modules\Booking\Requests
 */
class RemoveBookingRequest extends BaseRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'booking_id' => 'required|exists:bookings,id',
        ];
    }

    public function validationData(): array
    {
        return array_merge($this->route()?->parameters() ?? [], $this->all());
    }
}
