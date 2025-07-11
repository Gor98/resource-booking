<?php

namespace App\Modules\Booking\Exceptions;

use Exception;
use App\Common\Tools\APIResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BookingConflictException extends Exception
{
    /**
     * @param $request
     * @return JsonResponse
     */
    public function render($request): JsonResponse
    {
        return APIResponse::errorResponse(
            [],
            'The resource is already booked for this time slot.',
            Response::HTTP_CONFLICT
        );
    }
}
