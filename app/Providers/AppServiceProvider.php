<?php

namespace App\Providers;

use App\Repositories\Admin\PatientRepository;
use App\Repositories\Contracts\Admin\PatientRepositoryInterface;
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
        //
    }

    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public array $singletons = [
        PatientRepositoryInterface::class => PatientRepository::class
    ];
}
