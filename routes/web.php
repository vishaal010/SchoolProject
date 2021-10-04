<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\Profile;
use App\Http\Controllers\TagsController;


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

Route::get('/', \App\Http\Controllers\HomeController::class);


Route::resource('/photo', PhotoController::class);

Route::get('/tag/{tag}' , '\App\Http\Controllers\TagsController@index');


Route::get('photo/review/{photo_id}', \App\Http\Livewire\User\UserReviewComponent::class)->name('photo.review');


// User related pages
Route::prefix('user')->middleware(['auth', 'verified'])->name('user.')->group(function (){
Route::get('profile', Profile::class)->name('profile');
Route::get('/users/status/{user_id}/{status_code}', [UserController::class,'updateStatus'])->name('status.update');




});

// Admin Route
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin','verified'])->name('admin.')->group(function (){
    Route::resource('users', UserController::class);
});
