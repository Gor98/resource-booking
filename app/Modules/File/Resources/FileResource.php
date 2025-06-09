<?php


namespace App\Modules\File\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class FileResource
 * @package App\Modules\File\Resources
 */
class FileResource extends JsonResource
{
    /**
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fileable_type' => $this->fileable_type,
            'fileable_id' => $this->fileable_id,
            'full_path' => $this->full_path,
            'type' => $this->type,
            'name' => $this->name,
        ];
    }
}
