<?php


namespace App\Modules\Auth\Controllers;

use App\Common\Bases\Controller;
use App\Common\Tools\APIResponse;
use App\Modules\Auth\Contracts\AuthUserServiceContract;
use App\Modules\Auth\Requests\RegisterRequest;
use App\Modules\Auth\Resources\UserResource;
use Illuminate\Http\JsonResponse;


/**
 * Class RegisterController
 * @package App\Modules\Auth\Controllers
 */
class RegisterController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @param AuthUserService $authService
     * @return JsonResponse
     */
    public function __invoke(RegisterRequest $request, AuthUserServiceContract $authService): JsonResponse
    {
        return APIResponse::successResponse(new UserResource($authService->register($request)));
    }
}
