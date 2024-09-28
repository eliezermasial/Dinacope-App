<?php

namespace App\Providers;

use App\Services\ServiceEcole;
use App\Services\ServiceEleve;
use Illuminate\Support\ServiceProvider;
use App\Contracts\EcoleServiceInterface;
use App\Contracts\ElevesServiceInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    
    public function register()
    {
        $this->app->bind(ElevesServiceInterface::class, ServiceEleve::class);
        $this->app->bind(EcoleServiceInterface::class, ServiceEcole::class);
    }
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
