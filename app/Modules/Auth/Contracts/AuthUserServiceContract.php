<?php

namespace App\Modules\Auth\Contracts;

use App\Modules\Auth\Models\User;
use App\Modules\Auth\Requests\LoginRequest;
use App\Modules\Auth\Requests\RegisterRequest;

/**
 * Interface AuthUserServiceContract
 * @package App\Modules\Auth\Contracts
 */
interface AuthUserServiceContract
{

    /**
     * @return void
     */
    public function logout(): void;

    /**
     * @param LoginRequest $request
     * @return array
     */
    public function login(LoginRequest $request): array;

    /**
     * @param RegisterRequest $request
     * @return User
     */
    public function register(RegisterRequest $request): User;
}
