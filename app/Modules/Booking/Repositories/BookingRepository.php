<?php

namespace App\Modules\Booking\Repositories;

use App\Common\Bases\Repository;
use App\Common\Exceptions\RepositoryException;
use App\Modules\Booking\Models\Booking;

/**
 * Class BookingRepository
 * @package App\Modules\Booking\Repositories
 */
class BookingRepository extends Repository
{
    /**
     * @var array
     */
    protected array $fillable = [
        'resource_id',
        'user_id',
        'start_time',
        'end_time'
    ];

    /**
     * @return string
     */
    protected function model(): string
    {
        return Booking::class;
    }

    /**
     * @param int $resource_id
     * @param string $startTime
     * @param string $endTime
     * @return bool
     * @throws RepositoryException
     */
    public function isAvailable(int $resource_id, string $startTime, string $endTime): bool
    {
        return !$this->query()->where('resource_id', $resource_id)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->where('start_time', '<', $endTime)
                    ->where('end_time', '>', $startTime);
            })
            ->exists();
    }
}
