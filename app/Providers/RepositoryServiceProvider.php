<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Employees\Employee\Eloquent\EmployeeRepository;
use App\Repositories\Projects\Project\Eloquent\ProjectRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EmployeeRepository::class);
        $this->app->bind(ProjectRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}