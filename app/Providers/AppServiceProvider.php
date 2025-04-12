<?php

namespace App\Providers;

use App\Repositories\Admin\ConsumtionReportRepository;
use App\Repositories\Admin\HerbalMedicineRepository;
use App\Repositories\Admin\PatientRepository;
use App\Repositories\Contracts\Admin\ConsumtionReportRepositoryInterface;
use App\Repositories\Contracts\Admin\HerbalMedicineRepositoryInterface;
use App\Repositories\Contracts\Admin\PatientRepositoryInterface;
use App\Repositories\Contracts\Frontend\FrontendRegisterRepositoryInterface;
use App\Repositories\Frontend\FrontendRegisterRepository;
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
        PatientRepositoryInterface::class => PatientRepository::class,
        HerbalMedicineRepositoryInterface::class => HerbalMedicineRepository::class,
        ConsumtionReportRepositoryInterface::class => ConsumtionReportRepository::class,

        FrontendRegisterRepositoryInterface::class => FrontendRegisterRepository::class
    ];
}
