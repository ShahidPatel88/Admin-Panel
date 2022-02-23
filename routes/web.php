<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;

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
    return view('welcome');
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/route-cache', function() {
    Artisan::call('route:clear');
    return "Route is cleared";
});

Route::get('/view-cache', function() {
    Artisan::call('view:clear');
    return "Route is cleared";
});


Auth::routes();

Route::group(['middleware' => 'web'], function () {
    //Admin Login
    Route::get('admin/login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('admin/authenticate', [LoginController::class, 'authenticate'])->name('admin.authenticate');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
