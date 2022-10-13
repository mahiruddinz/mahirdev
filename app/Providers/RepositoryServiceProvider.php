<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Employees\Employee\Eloquent\EmployeeRepository;

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