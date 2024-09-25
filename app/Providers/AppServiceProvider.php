<?php

namespace App\Providers;

use App\Services\ServiceEleve;
use Illuminate\Support\ServiceProvider;
use App\Contracts\ElevesServiceInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    
    public function register()
    {
        $this->app->bind(ElevesServiceInterface::class, ServiceEleve::class);
    }
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
