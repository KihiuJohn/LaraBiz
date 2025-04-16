<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        // Call parent's boot method
        parent::boot();

        // Map routes
        $this->routes(function () {
            // API routes (no CSRF, stateless)
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            // Web routes (with CSRF, sessions, etc.)
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
