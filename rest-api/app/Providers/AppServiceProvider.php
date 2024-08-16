<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Event;
use App\Policies\EventPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('delete-event', [EventPolicy::class, 'delete']);
        Gate::define('update-evnet', [EventPolicy::class, 'update']);
    }
}
