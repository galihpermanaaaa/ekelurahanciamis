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


    Route::get('/', [App\Http\Controllers\landigpageController::class, 'index'])->name('index');


Route::group(['middleware'=>'auth'],function()
{
    Route::get('dashboard',function()
    {
        return view('dashboard');
    });
    Route::get('dashboard',function()
    {
        return view('dashboard');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('profile/data_profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile/data_profile');
Route::post('update_profile', [App\Http\Controllers\ProfileController::class, 'update_profile'])->name('update_profile');
Route::post('update_password', [App\Http\Controllers\ProfileController::class, 'update_password'])->name('update_password');


Route::get('user/data_user', [App\Http\Controllers\UserController::class, 'index'])->name('user/data_user');
Route::post('save_user', [App\Http\Controllers\UserController::class, 'store'])->name('save_user');
Route::post('update_user', [App\Http\Controllers\UserController::class, 'update'])->name('update_user');
Route::delete('hapus_user', [App\Http\Controllers\UserController::class, 'delete'])->name('hapus_user');


Auth::routes([
    'register' => false
]);
