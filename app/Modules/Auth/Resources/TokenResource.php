<?php


namespace App\Modules\Auth\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class TokenResource
 * @package App\Modules\Auth\TokenResource
 */
class TokenResource extends JsonResource
{
    /**
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'token_type' => "Bearer",
            'access_token' => $this['token'],
            'expires_at' => format(now()->addSeconds($this['expires_at']))
        ];
    }
}
