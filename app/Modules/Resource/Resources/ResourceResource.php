<?php

namespace App\Modules\Resource\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ResourceResource
 * @package App\Modules\Resources\Resources
 */
class ResourceResource extends JsonResource
{
    /**
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'description' => $this->description,
            'create_at' => format($this->created_at),
            'bookings' => $this->whenLoaded('bookings'),
        ];
    }
}
