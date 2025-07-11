<?php

namespace App\Modules\Booking\Services;

use App\Common\Bases\Service;
use App\Common\Exceptions\RepositoryException;
use App\Modules\Booking\Exceptions\BookingConflictException;
use App\Modules\Booking\Models\Booking;
use App\Modules\Booking\Contracts\BookingServiceContract;
use App\Modules\Booking\Repositories\BookingRepository;
use App\Modules\Booking\Requests\StoreBookingRequest;
use App\Modules\Booking\Requests\RemoveBookingRequest;

/**
 * Class BookingService
 * @package App\Modules\Booking\Services
 */
class BookingService extends Service implements BookingServiceContract
{
    /**
     * @param BookingRepository $bookingRepository
     */
    public function __construct(protected BookingRepository $bookingRepository)
    {
    }

    /**
     * @param StoreBookingRequest $request
     * @return Booking
     * @throws BookingConflictException
     * @throws RepositoryException
     */
    public function book(StoreBookingRequest $request): Booking
    {
        if($this->bookingRepository->isAvailable(
            $request->input('resource_id'),
            $request->input('start_time'),
            $request->input('end_time'),
        )) {
            return $this->bookingRepository->create($request->all())->load(['user', 'resource']);
        }

        throw new BookingConflictException();
    }

    /**
     * @param Booking $booking
     * @return void
     * @throws \Exception
     */
    public function unBook(Booking $booking): void
    {
        $this->bookingRepository->delete($booking);
    }
}
