<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotographyController;
use App\Http\Controllers\Admin\UserController;

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

Route::resource('/', PhotographyController::class);

Route::resource('/admin/users', UserController::class);


// Admin Route
Route::prefix('admin')->name('admin.')->group(function (){
    Route::resource('users', UserController::class);
});
