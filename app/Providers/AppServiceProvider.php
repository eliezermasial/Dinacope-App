<?php

namespace App\Providers;

use App\Services\ServiceEleve;
use Illuminate\Support\ServiceProvider;
use App\Contracts\EleveServiceInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    
    public function register()
    {
        $this->app->bind(EleveServiceInterface::class, ServiceEleve::class);
    }
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
