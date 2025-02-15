<?php

namespace App\Providers;

use App\Interfaces\MedicoRepositoryInterface;
use App\Repositories\MedicoRepository;
use App\Services\MedicoService;
use Illuminate\Support\ServiceProvider;

class MedicoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MedicoRepositoryInterface::class, MedicoRepository::class);
        $this->app->bind(MedicoService::class, function ($app) {
            return new MedicoService($app->make(MedicoRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
