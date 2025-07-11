<?php

namespace App\Modules\Booking\Resources;

use App\Modules\Auth\Resources\UserResource;
use App\Modules\Resource\Resources\ResourceResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class BookingResource
 * @package App\Modules\Booking\Resources
 */
class BookingResource extends JsonResource
{
    /**
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'start_date' => $this->start_time,
            'end_date' => $this->end_time,
            'resource' => new ResourceResource($this->whenLoaded('resource')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
