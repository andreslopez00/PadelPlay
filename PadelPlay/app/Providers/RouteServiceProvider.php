<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/dashboard';

    public function boot(): void
    {
        $this->routes(function () {
            if (file_exists(base_path('routes/api.php'))) {
                Route::middleware('api')
                    ->prefix('api')
                    ->group(base_path('routes/api.php'));
            }

            if (file_exists(base_path('routes/web.php'))) {
                Route::middleware('web')
                    ->group(base_path('routes/web.php'));
            }
        });
    }
}