<?php

namespace App\Modules\Auth\Observers;

use App\Modules\Auth\Models\User;

/**
 * Class UserObserver
 * @package App\Modules\Auth\Observers
 */
class UserObserver
{
    /**
     * @param User $user
     */
    public function created(User $user): void
    {
        if (is_null($user->email_verified_at)) {
            $user->email_verified_at = now();
            $user->save();
        }
    }
}
