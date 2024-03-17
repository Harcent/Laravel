<?php

namespace App\Providers;

use App\Repositories\ToDo\ToDoEloquentORM;
use App\Repositories\ToDo\ToDoRepositoryInterface;
use App\Repositories\ToDoItem\ToDoItemEloquentORM;
use App\Repositories\ToDoItem\ToDoItemRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ToDoRepositoryInterface::class,
            ToDoEloquentORM::class
        );
        $this->app->bind(
            ToDoItemRepositoryInterface::class,
            ToDoItemEloquentORM::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
