<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employees\EmployeeController;
use App\Http\Controllers\Projects\ProjectController;
use App\Http\Controllers\Projects\TaskProjectController;

use App\Http\Controllers\Marketings\ClientController;
use App\Http\Controllers\GeneralAffairs\AssetController;

use App\Http\Controllers\FrontPage\ServicesController;
use App\Http\Controllers\FrontPage\CategoriesController;
use App\Http\Controllers\FrontPage\BlogController;
use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Http\Controllers\HomeController;
use App\Models\FrontPage\Blog;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Blog $blog) {
    $blog = Blog::all();
    return view('landing.index', ['blog' => $blog]);
});
Route::get('services-branding-protection', [ServicesController::class, 'brandingProtection'])->name('branding.protection');
Route::get('services-creative-agency', [ServicesController::class, 'creativeAgency'])->name('creative-agency');

Route::get('services-media-press-release', [ServicesController::class, 'mediaPressRelease'])->name('media-press-release');
Route::get('services-website-development', [ServicesController::class, 'websiteDevelopment'])->name('website-development');
Route::get('services-kol-management', [ServicesController::class, 'kolManagement'])->name('kol-management');
Route::get('services-outsourcing-team', [ServicesController::class, 'outsourcingTeam'])->name('outsourcing-team');
Route::get('blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Auth::routes();
Route::middleware('auth')->group(function() {
	Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::middleware('employee')->prefix('employees')->group(function () {
        Route::resource('user', EmployeeController::class);  
        Route::get('user/{id}/delete/', [EmployeeController::class, 'delete'])->name('user.delete');
    });
    Route::middleware('project')->prefix('user')->group(function () {
        Route::resource('task-project', TaskProjectController::class);  
        Route::get('task-project/{id}/delete/', [TaskProjectController::class, 'delete'])->name('task-project.delete');
        Route::resource('project', ProjectController::class);  
        Route::get('project/{id}/delete/', [ProjectController::class, 'delete'])->name('project.delete');
    });
    Route::middleware('marketing')->prefix('marketings')->group(function () {
        Route::resource('client', ClientController::class);  
        Route::get('client/{id}/delete/', [ClientController::class, 'delete'])->name('client.delete');
    });
    Route::middleware('general.affairs')->prefix('general-affairs')->group(function () {
        Route::resource('assets', AssetController::class);  
        Route::get('assets/{id}/delete/', [AssetController::class, 'delete'])->name('assets.delete');
    });
    Route::middleware('seo')->prefix('seo')->group(function () {
        Route::resource('categories', CategoriesController::class);  
        Route::resource('blogs', BlogController::class);  
       
        Route::resource('services', ServicesController::class);  
        Route::get('categories/{id}/delete/', [AssetController::class, 'delete'])->name('categories.delete');
        Route::get('blogs/{id}/delete/', [BlogController::class, 'delete'])->name('blogs.delete');
        Route::get('services/{id}/delete/', [ServicesController::class, 'delete'])->name('services.delete');
    });
    Route::get('check_slug', function () {
        $slug = SlugService::createSlug(App\Models\FrontPage\Blog::class, 'slug', request('title'));
        return response()->json(['slug' => $slug]);
    })->name('check_slug');
    Route::get('user/list', [EmployeeController::class, 'getList'])->name('user.list');
    Route::get('assets/list', [AssetController::class, 'getList'])->name('assets.list');
    Route::get('client/list', [ClientController::class, 'getList'])->name('client.list');
    Route::get('task-project/list', [TaskProjectController::class, 'getList'])->name('task.list');
    Route::get('categories/list', [CategoriesController::class, 'getList'])->name('categories.list');
    Route::get('blogs/list', [BlogController::class, 'getList'])->name('blogs.list');
    Route::get('services/list', [ServicesController::class, 'getList'])->name('services.list');
});
//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');