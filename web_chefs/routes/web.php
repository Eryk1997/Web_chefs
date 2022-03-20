<?php

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['web'])->group(function(){
    Route::get('/restaurants',[RestaurantController::class,'index'])->name('restaurants.index');
});


Route::middleware(['web','auth'])->group(function(){
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('user.destroy');
    Route::get('/users/edit',[UserController::class,'edit'])->name('user.edit');
    Route::put('/users/{user}',[UserController::class,'update'])->name('user.update');

    Route::put('/users/attach/{restaurant}',[UserController::class,'attachRestaurant'])->name('attach.restaurant');
    Route::put('/users/detach/{restaurant}',[UserController::class,'detachRestaurant'])->name('detach.restaurant');
});
