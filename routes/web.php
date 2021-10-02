<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotographyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\Profile;


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

Route::resource('/', \App\Http\Controllers\HomeController::class);


Route::resource('/photography', PhotographyController::class);




// User related pages
Route::prefix('user')->middleware(['auth', 'verified'])->name('user.')->group(function (){
Route::get('profile', Profile::class)->name('profile');


});

// Admin Route
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin','verified'])->name('admin.')->group(function (){
    Route::resource('users', UserController::class);
});
