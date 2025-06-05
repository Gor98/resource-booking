<?php


namespace App\Modules\Auth\Services;


use App\Common\Bases\Service;
use App\Common\Exceptions\RepositoryException;
use App\Modules\Auth\Contracts\AuthUserServiceContract;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Repositories\AuthUserRepository;
use App\Modules\Auth\Requests\LoginRequest;
use App\Modules\Auth\Requests\RegisterRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;

/**
 * Class AuthUserService
 * @package App\Modules\Auth\Services
 */
class AuthUserService extends Service implements AuthUserServiceContract
{
    const AUTH_EXP_DAYS = 7;

    /**
     * @param AuthUserRepository $authUserRepository
     */
    public function __construct(protected AuthUserRepository $authUserRepository)
    {
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        auth()->user()->tokens()->delete();
    }

    /**
     * @throws AuthenticationException
     * @throws RepositoryException
     */
    public function login(LoginRequest $request): array
    {
        $user  = $this->authUserRepository->findBy(['email' => $request->input('email')]);

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            throw new AuthenticationException('Invalid credentials');
        }

         $user->tokens()->delete();

        $expiresAt = now()->addDays(self::AUTH_EXP_DAYS);

        $token = $user->createToken('api-token', [], $expiresAt);

        return [
            'token' => $token->plainTextToken,
            'expires_at' => $expiresAt->toDateTimeString(),
        ];
    }

    /**
     * @param RegisterRequest $request
     * @return User
     * @throws RepositoryException
     */
    public function register(RegisterRequest $request): User
    {
        return $this->authUserRepository->create($request->validated());
    }
}
