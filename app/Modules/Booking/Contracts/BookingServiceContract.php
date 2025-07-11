<?php

namespace App\Modules\Booking\Contracts;

use App\Modules\Booking\Models\Booking;
use App\Modules\Booking\Requests\BookingRequest;
use App\Modules\Booking\Requests\RemoveBookingRequest;
use App\Modules\Booking\Requests\StoreBookingRequest;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface BookingServiceContract
 * @package App\Modules\Booking\Contracts
 */
interface BookingServiceContract
{
    /**
     * @param StoreBookingRequest $request
     * @return Booking
     */
    public function book(StoreBookingRequest $request): Booking;

    /**
     * @param Booking $booking
     * @return void
     */
    public function unBook(Booking $booking): void;
}
