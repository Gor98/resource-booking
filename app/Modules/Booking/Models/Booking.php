<?php

namespace App\Modules\Booking\Models;

use App\Modules\Auth\Models\User;
use App\Modules\Resource\Models\Resource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Booking
 * @package App\Modules\Booking\Models
 */
class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'resource_id',
        'user_id',
        'start_time',
        'end_time'
    ];

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

