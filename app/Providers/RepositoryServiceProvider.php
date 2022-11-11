<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Employees\Employee\Eloquent\EmployeeRepository;
use App\Repositories\Projects\Project\Eloquent\ProjectRepository;
use App\Repositories\Projects\UserTask\Eloquent\UserTaskRepository;

use App\Repositories\Marketings\Client\Eloquent\ClientRepository;
use App\Repositories\GeneralAffairs\Assets\Eloquent\AssetsRepository;


use App\Repositories\FrontPage\Blogs\Eloquent\BlogRepository;
use App\Repositories\FrontPage\Categories\Eloquent\CategoriesRepository;
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
        $this->app->bind(UserTaskRepository::class);
        $this->app->bind(TaskProjectRepository::class);
        $this->app->bind(ClientRepository::class);
        $this->app->bind(AssetsRepository::class);
        $this->app->bind(CategoriesRepository::class);
        $this->app->bind(BlogRepository::class);

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