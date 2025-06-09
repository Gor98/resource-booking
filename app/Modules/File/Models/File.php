<?php

namespace App\Modules\File\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class File
 * @package App\Modules\File\Models
 */
class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_path',
        'path',
        'name',
        'type',
        'fileable_type',
        'fileable_id',
    ];

    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }
}

