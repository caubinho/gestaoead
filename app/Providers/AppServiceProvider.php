<?php

namespace App\Providers;

use App\Repositories\Eloquent\{
    AdminRepository,
    LessonRepository,
    ModuleRepository,
    CourseRepository,
    ReplySupportRepository,
    SupportRepository,
    UserRepository

};
use App\Repositories\{
    AdminRepositoryInterface,
    LessonRepositoryInterface,
    CourseRepositoryInterface,
    ModuleRepositoryInterface,
    ReplySupportRepositoryInterface,
    SupportRepositoryInterface,
    UserRepositoryInterface
};


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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
