<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/', \App\Http\Controllers\HomePageController::class);
//    Route::get('/', [\App\Http\Controllers\DashboardController::class,'index'])->name('home');
    Route::get('/admin/today', [\App\Http\Controllers\DashboardController::class,'indexOfToday']);
    Route::get('/admin/this-week', [\App\Http\Controllers\DashboardController::class,'indexOfThisWeek']);
    Route::get('/admin/this-month', [\App\Http\Controllers\DashboardController::class,'indexOfThisMonth']);
    Route::get('/admin/this-year', [\App\Http\Controllers\DashboardController::class,'indexOfThisYear']);

//    Route::resource('/', \App\Http\Controllers\HomePageController::class);
    Route::resource('user', \App\Http\Controllers\UserHomePageController::class);
    Route::get('user-list',[\App\Http\Controllers\UserHomePageController::class, 'userList'])->name('user.list');
    Route::resource('profile', \App\Http\Controllers\UserController::class);
    Route::resource('blog', \App\Http\Controllers\BlogController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


