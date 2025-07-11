<?php


namespace App\Modules\Booking\Controllers;

use App\Common\Bases\Controller;
use App\Common\Tools\APIResponse;
use App\Modules\Booking\Contracts\BookingServiceContract;
use App\Modules\Booking\Models\Booking;
use App\Modules\Booking\Requests\StoreBookingRequest;
use App\Modules\Booking\Requests\RemoveBookingRequest;
use App\Modules\Booking\Resources\BookingResource;
use Illuminate\Http\JsonResponse;


/**
 * Class BookingController
 * @package App\Modules\Booking\Controllers
 */
class BookingController extends Controller
{
    /**
     * @param BookingServiceContract $bookingService
     */
    public function __construct(protected BookingServiceContract $bookingService)
    {
    }

    /**
     * @param StoreBookingRequest $request
     * @return JsonResponse
     */
    public function store(StoreBookingRequest $request): JsonResponse
    {
        return APIResponse::successResponse(new BookingResource($this->bookingService->book($request)));
    }

    /**
     * @param Booking $booking
     * @return JsonResponse
     */
    public function remove(Booking $booking): JsonResponse
    {
        $this->bookingService->unBook($booking);

        return APIResponse::successResponse([]);
    }
}
