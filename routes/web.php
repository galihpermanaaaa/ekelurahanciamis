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
Route::post('save_skm', [App\Http\Controllers\landigpageController::class, 'saveSkm'])->name('save_skm');
Route::post('save_domisili', [App\Http\Controllers\landigpageController::class, 'saveDomisili'])->name('save_domisili');
Route::post('save_duda', [App\Http\Controllers\landigpageController::class, 'saveDuda'])->name('save_duda');
Route::post('save_janda', [App\Http\Controllers\landigpageController::class, 'saveJanda'])->name('save_janda');
Route::post('save_sbm', [App\Http\Controllers\landigpageController::class, 'saveSBM'])->name('save_sbm');
Route::post('save_bmr', [App\Http\Controllers\landigpageController::class, 'saveBMR'])->name('save_bmr');
Route::post('save_kematian', [App\Http\Controllers\landigpageController::class, 'saveKematian'])->name('save_kematian');
Route::post('save_domisili_pt', [App\Http\Controllers\landigpageController::class, 'saveDomisiliPT'])->name('save_domisili_pt');


Route::get('layanan/sku',  [App\Http\Controllers\landigpageController::class, 'filtersku'])->name('layanan/sku');
Route::get('layanan/skm',  [App\Http\Controllers\landigpageController::class, 'filterskm'])->name('layanan/skm');
Route::get('layanan/domisili',  [App\Http\Controllers\landigpageController::class, 'filterdomisili'])->name('layanan/domisili');
Route::get('layanan/duda',  [App\Http\Controllers\landigpageController::class, 'filterduda'])->name('layanan/duda');
Route::get('layanan/janda',  [App\Http\Controllers\landigpageController::class, 'filterjanda'])->name('layanan/janda');
Route::get('layanan/skbm',  [App\Http\Controllers\landigpageController::class, 'filterskbm'])->name('layanan/skbm');
Route::get('layanan/bmr',  [App\Http\Controllers\landigpageController::class, 'filterbmr'])->name('layanan/bmr');
Route::get('layanan/kematian',  [App\Http\Controllers\landigpageController::class, 'filterkematian'])->name('layanan/kematian');
Route::get('layanan/domisiliPT',  [App\Http\Controllers\landigpageController::class, 'filterdomisiliPT'])->name('layanan/domisiliPT');

Route::get('layanan/surat_sku/{id}', [App\Http\Controllers\landigpageController::class, 'layanan_surat_sku']);
Route::get('layanan/surat_skm/{id}', [App\Http\Controllers\landigpageController::class, 'layanan_surat_skm']);
Route::get('layanan/surat_domisili/{id}', [App\Http\Controllers\landigpageController::class, 'layanan_surat_domisili']);
Route::get('layanan/surat_duda/{id}', [App\Http\Controllers\landigpageController::class, 'layanan_surat_duda']);
Route::get('layanan/surat_janda/{id}', [App\Http\Controllers\landigpageController::class, 'layanan_surat_janda']);
Route::get('layanan/surat_skbm/{id}', [App\Http\Controllers\landigpageController::class, 'layanan_surat_skbm']);
Route::get('layanan/surat_bmr/{id}', [App\Http\Controllers\landigpageController::class, 'layanan_surat_bmr']);
Route::get('layanan/surat_kematian/{id}', [App\Http\Controllers\landigpageController::class, 'layanan_surat_kematian']);
Route::get('layanan/surat_domisili_pt/{id}', [App\Http\Controllers\landigpageController::class, 'layanan_surat_domisili_pt']);




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
Route::get('user/sku/data_sku/cari_sku',  [App\Http\Controllers\PembuatSKUController::class, 'filterskurw'])->name('user/sku/data_sku/cari_sku');
Route::get('user/sku/data_sku_rw', [App\Http\Controllers\PembuatSKUController::class, 'indexRW'])->name('user/sku/data_sku_rw');

// -----------------------------skm----------------------------------------//
Route::get('user/skm/data_skm', [App\Http\Controllers\PembuatSKMController::class, 'index'])->name('user/skm/data_skm');
Route::get('user/skm/verifikasi_skm/{id}', [App\Http\Controllers\PembuatSKMController::class, 'verifikasi_skm']);
Route::post('user/skm/verifikasi_skm_skm', [App\Http\Controllers\PembuatSKMController::class, 'verifikasi_skm_skm'])->name('verifikasi_skm_skm');
Route::get('user/skm/surat_skm/{id}', [App\Http\Controllers\PembuatSKMController::class, 'surat_skm']);
Route::delete('delete_skm', [App\Http\Controllers\PembuatSKMController::class, 'destroy_skm'])->name('delete_skm');
Route::get('user/skm/lihat_data_skm/{id}', [App\Http\Controllers\PembuatSKMController::class, 'lihat_data_skm']);
Route::get('user/skm/data_skm/cari_skm',  [App\Http\Controllers\PembuatSKMController::class, 'filterskmrw'])->name('user/skm/data_skm/cari_skm');
Route::get('user/skm/data_skm_rw', [App\Http\Controllers\PembuatSKMController::class, 'indexRWSkm'])->name('user/skm/data_skm_rw');

// -----------------------------domisili----------------------------------------//
Route::get('user/domisili/data_domisili', [App\Http\Controllers\PembuatDomisiliController::class, 'index'])->name('user/domisili/data_domisili');
Route::get('user/domisili/verifikasi_domisili/{id}', [App\Http\Controllers\PembuatDomisiliController::class, 'verifikasi_domisili']);
Route::post('user/domisili/verifikasi_domisili_domisili', [App\Http\Controllers\PembuatDomisiliController::class, 'verifikasi_domisili_domisili'])->name('verifikasi_domisili_domisili');
Route::get('user/domisili/surat_domisili/{id}', [App\Http\Controllers\PembuatDomisiliController::class, 'surat_domisili']);
Route::delete('delete_domisili', [App\Http\Controllers\PembuatDomisiliController::class, 'destroy_domisili'])->name('delete_domisili');
Route::get('user/domisili/lihat_data_domisili/{id}', [App\Http\Controllers\PembuatDomisiliController::class, 'lihat_data_domisili']);
Route::get('user/domisili/data_domisili/cari_domisili',  [App\Http\Controllers\PembuatDomisiliController::class, 'filterdomisilirw'])->name('user/domisili/data_domisili/cari_domisili');
Route::get('user/domisili/data_domisili_rw', [App\Http\Controllers\PembuatDomisiliController::class, 'indexRWDomisili'])->name('user/domisili/data_domisili_rw');


// -----------------------------Duda----------------------------------------//
Route::get('user/duda/data_duda', [App\Http\Controllers\PembuatSuratDudaController::class, 'index'])->name('user/duda/data_duda');
Route::get('user/duda/verifikasi_duda/{id}', [App\Http\Controllers\PembuatSuratDudaController::class, 'verifikasi_duda']);
Route::post('user/duda/verifikasi_duda_duda', [App\Http\Controllers\PembuatSuratDudaController::class, 'verifikasi_duda_duda'])->name('verifikasi_duda_duda');
Route::get('user/duda/surat_duda/{id}', [App\Http\Controllers\PembuatSuratDudaController::class, 'surat_duda']);
Route::delete('delete_duda', [App\Http\Controllers\PembuatSuratDudaController::class, 'destroy_duda'])->name('delete_duda');
Route::get('user/duda/lihat_data_duda/{id}', [App\Http\Controllers\PembuatSuratDudaController::class, 'lihat_data_duda']);
Route::get('user/duda/data_duda/cari_duda',  [App\Http\Controllers\PembuatSuratDudaController::class, 'filterdudarw'])->name('user/duda/data_duda/cari_duda');
Route::get('user/duda/data_duda_rw', [App\Http\Controllers\PembuatSuratDudaController::class, 'indexRWDuda'])->name('user/duda/data_duda_rw');

// -----------------------------janda----------------------------------------//
Route::get('user/janda/data_janda', [App\Http\Controllers\PembuatSuratJandaController::class, 'index'])->name('user/janda/data_janda');
Route::get('user/janda/verifikasi_janda/{id}', [App\Http\Controllers\PembuatSuratJandaController::class, 'verifikasi_janda']);
Route::post('user/janda/verifikasi_janda_janda', [App\Http\Controllers\PembuatSuratJandaController::class, 'verifikasi_janda_janda'])->name('verifikasi_janda_janda');
Route::get('user/janda/surat_janda/{id}', [App\Http\Controllers\PembuatSuratJandaController::class, 'surat_janda']);
Route::delete('delete_janda', [App\Http\Controllers\PembuatSuratJandaController::class, 'destroy_janda'])->name('delete_janda');
Route::get('user/janda/lihat_data_janda/{id}', [App\Http\Controllers\PembuatSuratJandaController::class, 'lihat_data_janda']);
Route::get('user/janda/data_janda/cari_janda',  [App\Http\Controllers\PembuatSuratJandaController::class, 'filterjandarw'])->name('user/janda/data_janda/cari_janda');
Route::get('user/janda/data_janda_rw', [App\Http\Controllers\PembuatSuratJandaController::class, 'indexRWJanda'])->name('user/janda/data_janda_rw');



// -----------------------------sbm----------------------------------------//
Route::get('user/skbm/data_skbm', [App\Http\Controllers\PembuatSuratSBMController::class, 'index'])->name('user/skbm/data_skbm');
Route::get('user/skbm/verifikasi_skbm/{id}', [App\Http\Controllers\PembuatSuratSBMController::class, 'verifikasi_skbm']);
Route::post('user/skbm/verifikasi_skbm_skbm', [App\Http\Controllers\PembuatSuratSBMController::class, 'verifikasi_skbm_skbm'])->name('verifikasi_skbm_skbm');
Route::get('user/skbm/surat_skbm/{id}', [App\Http\Controllers\PembuatSuratSBMController::class, 'surat_skbm']);
Route::delete('delete_skbm', [App\Http\Controllers\PembuatSuratSBMController::class, 'destroy_skbm'])->name('delete_skbm');
Route::get('user/skbm/lihat_data_skbm/{id}', [App\Http\Controllers\PembuatSuratSBMController::class, 'lihat_data_skbm']);
Route::get('user/skbm/data_skbm/cari_skbm',  [App\Http\Controllers\PembuatSuratSBMController::class, 'filterskbmrw'])->name('user/skbm/data_skbm/cari_skbm');
Route::get('user/skbm/data_skbm_rw', [App\Http\Controllers\PembuatSuratSBMController::class, 'indexRWSkbm'])->name('user/skbm/data_skbm_rw');


// -----------------------------bmr----------------------------------------//
Route::get('user/bmr/data_bmr', [App\Http\Controllers\PembuatSuratBMRController::class, 'index'])->name('user/bmr/data_bmr');
Route::get('user/bmr/verifikasi_bmr/{id}', [App\Http\Controllers\PembuatSuratBMRController::class, 'verifikasi_bmr']);
Route::post('user/bmr/verifikasi_bmr_bmr', [App\Http\Controllers\PembuatSuratBMRController::class, 'verifikasi_bmr_bmr'])->name('verifikasi_bmr_bmr');
Route::get('user/bmr/surat_bmr/{id}', [App\Http\Controllers\PembuatSuratBMRController::class, 'surat_bmr']);
Route::delete('delete_bmr', [App\Http\Controllers\PembuatSuratBMRController::class, 'destroy_bmr'])->name('delete_bmr');
Route::get('user/bmr/lihat_data_bmr/{id}', [App\Http\Controllers\PembuatSuratBMRController::class, 'lihat_data_bmr']);
Route::get('user/bmr/data_bmr/cari_bmr',  [App\Http\Controllers\PembuatSuratBMRController::class, 'filterbmr'])->name('user/bmr/data_bmr/cari_bmr');
Route::get('user/bmr/data_bmr_rw', [App\Http\Controllers\PembuatSuratBMRController::class, 'indexRWBmr'])->name('user/bmr/data_bmr_rw');


// -----------------------------kematian----------------------------------------//
Route::get('user/kematian/data_kematian', [App\Http\Controllers\PembuatSuratKematianController::class, 'index'])->name('user/kematian/data_kematian');
Route::get('user/kematian/verifikasi_kematian/{id}', [App\Http\Controllers\PembuatSuratKematianController::class, 'verifikasi_kematian']);
Route::post('user/kematian/verifikasi_kematian_kematian', [App\Http\Controllers\PembuatSuratKematianController::class, 'verifikasi_kematian_kematian'])->name('verifikasi_kematian_kematian');
Route::get('user/kematian/surat_kematian/{id}', [App\Http\Controllers\PembuatSuratKematianController::class, 'surat_kematian']);
Route::delete('delete_kematian', [App\Http\Controllers\PembuatSuratKematianController::class, 'destroy_kematian'])->name('delete_kematian');
Route::get('user/kematian/lihat_data_kematian/{id}', [App\Http\Controllers\PembuatSuratKematianController::class, 'lihat_data_kematian']);
Route::get('user/kematian/data_kematian/cari_kematian',  [App\Http\Controllers\PembuatSuratKematianController::class, 'filterkematian'])->name('user/kematian/data_kematian/cari_kematian');
Route::get('user/kematian/data_kematian_rw', [App\Http\Controllers\PembuatSuratKematianController::class, 'indexRWKematian'])->name('user/kematian/data_kematian_rw');


// -----------------------------Domisili PT----------------------------------------//
Route::get('user/domisili_pt/data_domisilipt', [App\Http\Controllers\PembuatSuratDomisiliPTController::class, 'index'])->name('user/domisili_pt/data_domisilipt');
Route::get('user/domisili_pt/verifikasi_domisilipt/{id}', [App\Http\Controllers\PembuatSuratDomisiliPTController::class, 'verifikasi_domisilipt']);
Route::post('user/domisili_pt/verifikasi_domisilipt_domisilipt', [App\Http\Controllers\PembuatSuratDomisiliPTController::class, 'verifikasi_domisilipt_domisilipt'])->name('verifikasi_domisilipt_domisilipt');
Route::get('user/domisili_pt/surat_domisilipt/{id}', [App\Http\Controllers\PembuatSuratDomisiliPTController::class, 'surat_domisilipt']);
Route::delete('delete_domisilipt', [App\Http\Controllers\PembuatSuratDomisiliPTController::class, 'destroy_domisilipt'])->name('delete_domisilipt');
Route::get('user/domisili_pt/lihat_data_domisilipt/{id}', [App\Http\Controllers\PembuatSuratDomisiliPTController::class, 'lihat_data_domisilipt']);
Route::get('user/domisili_pt/data_domisilipt/cari_domisilipt',  [App\Http\Controllers\PembuatSuratDomisiliPTController::class, 'filterdomisilipt'])->name('user/domisili_pt/data_domisilipt/cari_domisilipt');
Route::get('user/domisili_pt/data_domisilipt_rw', [App\Http\Controllers\PembuatSuratDomisiliPTController::class, 'indexRWDomisiliPT'])->name('user/domisili_pt/data_domisilipt_rw');



Auth::routes(['register' => false]);
