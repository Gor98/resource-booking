<?php


namespace App\Modules\Auth\Controllers;

use App\Common\Bases\Controller;
use App\Common\Tools\APIResponse;
use App\Modules\Auth\Contracts\AuthUserServiceContract;
use App\Modules\Auth\Requests\LoginRequest;
use App\Modules\Auth\Resources\TokenResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class LoginController
 * @package App\Modules\Auth\Controllers
 */
class AuthController extends Controller
{
    public function __construct(protected AuthUserServiceContract $authUserService)
    {
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        return APIResponse::successResponse(new TokenResource($this->authUserService->login($request)));
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->authUserService->logout();
        return APIResponse::successResponse([], '', Response::HTTP_NO_CONTENT);
    }
}
