<?php

namespace App\Providers;

use App\Repositories\Eloquent\{
    AdminRepository,
    LessonRepository,
    ModuleRepository,
    CourseRepository,
    ReplySupportRepository,
    StatisticsRepository,
    SupportRepository,
    UserRepository

};
use App\Repositories\{
    AdminRepositoryInterface,
    LessonRepositoryInterface,
    CourseRepositoryInterface,
    ModuleRepositoryInterface,
    ReplySupportRepositoryInterface,
    StatisticsRepositoryInterface,
    SupportRepositoryInterface,
    UserRepositoryInterface
};
use App\Tenant\ManagerTenant;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class,
        );

        $this->app->singleton(
            AdminRepositoryInterface::class,
            AdminRepository::class
        );

        $this->app->singleton(
            CourseRepositoryInterface::class,
            CourseRepository::class
        );

        $this->app->singleton(
            ModuleRepositoryInterface::class,
            ModuleRepository::class
        );

        $this->app->singleton(
            LessonRepositoryInterface::class,
            LessonRepository::class
        );

        $this->app->singleton(
            SupportRepositoryInterface::class,
            SupportRepository::class
        );

        $this->app->singleton(
            ReplySupportRepositoryInterface::class,
            ReplySupportRepository::class,
        );

        $this->app->singleton(
            StatisticsRepositoryInterface::class,
            StatisticsRepository::class
        );


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /** Directives */
        $managerT = app(ManagerTenant::class);

        Blade::if('tenantmain', function () use ($managerT) {
            return $managerT->isSubdomainMain();
        });

        Blade::if('tenant', function () use ($managerT) {
            return !$managerT->isSubdomainMain();
        });
    }
}
