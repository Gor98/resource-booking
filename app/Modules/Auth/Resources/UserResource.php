<?php


namespace App\Modules\Auth\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserResource
 * @package App\Modules\Auth\Resources
 */
class UserResource extends JsonResource
{
    /**
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => format($this->email_verified_at ?? ''),
        ];
    }
}
