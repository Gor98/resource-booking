<?php


namespace App\Modules\Auth\Repositories;

use App\Common\Bases\Repository;
use App\Modules\Auth\Models\User;

/**
 * Class UserRepository
 * @package App\Modules\Auth\Repositories
 */
class AuthUserRepository extends Repository
{
    /**
     * @var array
     */
    protected array $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'email_verified_at',
    ];

    /**
     * @return string
     */
    protected function model(): string
    {
        return User::class;
    }
}
