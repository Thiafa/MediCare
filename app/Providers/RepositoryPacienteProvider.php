<?php

namespace App\Providers;

use App\Interfaces\PacienteRepositoryInterface;
use App\Repositories\PacienteRepository;
use App\Services\PacienteService;
use Illuminate\Support\ServiceProvider;

class RepositoryPacienteProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PacienteRepositoryInterface::class, PacienteRepository::class);
        $this->app->bind(PacienteService::class, function ($app) {
            return new PacienteService($app->make(PacienteRepositoryInterface::class));
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
