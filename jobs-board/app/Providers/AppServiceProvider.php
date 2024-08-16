<?php

namespace App\Providers;

use App\Models\Employer;
use App\Policies\EmployerPolicy;
use App\Policies\JobPolicy;
use App\View\Components\Alert;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('login', function(){
            return Auth()->check();
        });

        Gate::define('apply', [JobPolicy::class, 'apply']);
        Gate::define('create', [EmployerPolicy::class, 'create']);

        Gate::policy(Employer::class, EmployerPolicy::class);
        
    }
}
