<?php

namespace App\Providers;

use App\Services\ServiceAgent;
use App\Services\ServiceEcole;
use App\Services\ServiceEleve;
use App\Services\ServiceChefBattement;
use Illuminate\Support\ServiceProvider;
use App\Contracts\AgentServiceInterface;
use App\Contracts\EcoleServiceInterface;
use App\Contracts\ElevesServiceInterface;
use App\Contracts\ChefBattementServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    
    public function register()
    {
        $this->app->bind(EcoleServiceInterface::class, ServiceEcole::class);
        $this->app->bind(ElevesServiceInterface::class, ServiceEleve::class);
        $this->app->bind(AgentServiceInterface::class, ServiceAgent::class);
        $this->app->bind(ChefBattementServiceInterface::class, ServiceChefBattement::class);
    }
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
