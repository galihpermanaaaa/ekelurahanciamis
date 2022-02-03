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
Route::get('/getKota', [App\Http\Controllers\landigpageController::class, 'getKota'])->name('getKota');
Route::get('/getKecamatan', [App\Http\Controllers\landigpageController::class, 'getKecamatan'])->name('getKecamatan');
Route::get('/getDesa', [App\Http\Controllers\landigpageController::class, 'getDesa'])->name('getDesa');
Route::get('/getRw', [App\Http\Controllers\landigpageController::class, 'getRw'])->name('getRw');
Route::post('save_sku', [App\Http\Controllers\landigpageController::class, 'saveSku'])->name('save_sku');
Route::get('layanan/sku',  [App\Http\Controllers\landigpageController::class, 'filtersku'])->name('layanan/sku');
Route::get('layanan/surat_sku/{id}', [App\Http\Controllers\landigpageController::class, 'layanan_surat_sku']);
Route::get('/pesan', 'FlashMessageController@index');
Route::get('/get-pesan', 'FlashMessageController@pesan');

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


Auth::routes(['register' => false]);


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

// -----------------------------sku----------------------------------------//
Route::get('user/sku/data_sku', [App\Http\Controllers\PembuatSKUController::class, 'index'])->name('user/sku/data_sku');
Route::get('user/sku/verifikasi/{id}', [App\Http\Controllers\PembuatSKUController::class, 'verifikasi']);
Route::post('user/sku/verifikasi_sku', [App\Http\Controllers\PembuatSKUController::class, 'verifikasi_sku'])->name('verifikasi_sku');
Route::get('user/sku/surat_sku/{id}', [App\Http\Controllers\PembuatSKUController::class, 'surat_sku']);
Route::delete('delete_sku', [App\Http\Controllers\PembuatSKUController::class, 'destroy_sku'])->name('delete_sku');
Route::get('user/sku/lihat_data_sku/{id}', [App\Http\Controllers\PembuatSKUController::class, 'lihat_data_sku']);


Route::get('user/sku/data_sku_rw', [App\Http\Controllers\PembuatSKUController::class, 'indexRW'])->name('user/sku/data_sku_rw');


Auth::routes(['register' => false]);
