<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employees\EmployeeController;
use App\Http\Controllers\Projects\ProjectController;
use App\Http\Controllers\Projects\TaskProjectController;

use App\Http\Controllers\Marketings\ClientController;
use App\Http\Controllers\GeneralAffairs\AssetController;

use App\Http\Controllers\FrontPage\ServicesController;

use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('landing.index');
});
Route::prefix('services')->group(function () {
    Route::get('branding-protection', [ServicesController::class, 'brandingProtection'])->name('branding.protection');
});
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
    Route::get('user/list', [EmployeeController::class, 'getList'])->name('user.list');
    Route::get('assets/list', [AssetController::class, 'getList'])->name('assets.list');
    Route::get('client/list', [ClientController::class, 'getList'])->name('client.list');
    Route::get('task-project/list', [TaskProjectController::class, 'getList'])->name('task.list');
});
//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');