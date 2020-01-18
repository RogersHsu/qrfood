<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application;

use App\Contracts\Repository\ExerciseRepository;
use App\Contracts\Services\ExerciseService;

use App\Repository\ExerciseRepositoryImpl;
use App\Services\ExerciseServiceImpl;

class ExerciseProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(ExerciseRepository::class,function(){
            return new ExerciseRepositoryImpl();
        });

        $this->app->singleton(ExerciseService::class,function(Application $application){
            $exerciseService =  new ExerciseServiceImpl(
                $application->make(ExerciseRepository::class)
            );
            return $exerciseService;
        });
    }
}
