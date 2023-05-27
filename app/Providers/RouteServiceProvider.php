<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {

            $this->routeApiMap();
            $this->routeAdminMap();
            $this->routeAuthorMap();
            $this->routeWebMap();
        });
    }

    private function routeApiMap()
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }

    private function routeWebMap()
    {
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }

    private function routeAdminMap()
    {
        Route::middleware('api')
            ->prefix('api/admin/')
            ->group(base_path('routes/admin.php'));
    }

    private function routeAuthorMap()
    {
        Route::middleware('api')
            ->prefix('api/author/')
            ->group(base_path('routes/author.php'));
    }
}
