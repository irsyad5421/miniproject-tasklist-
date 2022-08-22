<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
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

Route::group(['middleware'=>['auth']],function(){

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

Route::resource('users',UserController::class)
->middleware('is_admin');

Route::view('profile','profile')->name('profile');
Route::put('profile',[ProfileController::class,'update'])->name('profile.update');

});
require __DIR__.'/auth.php';

Route::resource('todos',TodoController::class);
Route::get('complete/{todo}',[TodoController::class,'complete'])->name('todos.complete');
Route::get('manage/{user}',[UserController::class,'manage'])->name('users.manage');

