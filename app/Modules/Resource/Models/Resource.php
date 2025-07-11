<?php

namespace App\Modules\Resource\Models;

use App\Modules\Booking\Models\Booking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Resource
 * @package App\Modules\Resource\Models
 */
class Resource extends Model
{
    use HasFactory;

    const TYPES = [
        'APARTMENT',
        'CAR',
    ];

    protected $fillable = [
        'name',
        'type',
        'description'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

