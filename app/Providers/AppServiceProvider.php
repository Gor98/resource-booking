<?php

namespace App\Providers;

use App\Modules\Auth\Contracts\AuthUserServiceContract;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Observers\UserObserver;
use App\Modules\Auth\Services\AuthUserService;
use App\Modules\File\Contracts\FileServiceContract;
use App\Modules\File\Services\LocalFileService;
use App\Modules\File\Services\S3FileService;
use App\Modules\Product\Contracts\ProductServiceContract;
use App\Modules\Product\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthUserServiceContract::class, AuthUserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
    }
}
