<?php

use Illuminate\Support\Facades\Auth;
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
    return view('landingpage3');

});
Route::get('reguser', [App\Http\Controllers\Auth\RegisterController::class, 'reguser']);
Route::post('storeuser', [App\Http\Controllers\Auth\RegisterController::class, 'storeuser']);
Auth::routes();

Route::group(['middleware' => ['auth']], function(){

    // New Route

    // Route::get('/admin/dashboard', [App\Http\Controllers\TransaksiController::class, 'lihattabungan'])->name('dashboard');
    // Route::get('/admin/dashboard', [App\Http\Controllers\TransaksiController::class, 'lihattabungan'])->name('dashboard');
    Route::get('/admin/dashboarduser', [App\Http\Controllers\TransaksiController::class, 'lihattabungan'])->name('dashboarduser');
    Route::post('/admin/panggilact', [App\Http\Controllers\TransaksiController::class, 'panggilact'])->name('panggilact');
    Route::get('/admin/pilihtps', [App\Http\Controllers\TransaksiController::class, 'pilihtps'])->name('pilihtps');
    Route::get('/admin/pilihtps/{stor_id}/{tabungan_id}/{tps}', [App\Http\Controllers\TransaksiController::class, 'pilihtpsact'])->name('pilihtpsact');
    Route::get('/admin/invoice/{id}', [App\Http\Controllers\TransaksiController::class, 'invoice'])->name('invoice');
    Route::get('/admin/pesanan/{id?}', [App\Http\Controllers\TransaksiController::class, 'pesanan'])->name('pesanan');


    // Route::get('/admin/dashboardbaru', function () {
    //     $user_id = Auth::user()->id;

    //     $nasabah = DB::table('nasabahs')
    //         ->where('user_id', '=', $user_id)
    //         ->first();

    //     $kredit = DB::table('tabungans')
    //         ->where('nasabah_id', '=', $user_id)
    //         ->sum('kredit');
    //     $debit = DB::table('tabungans')
    //         ->where('nasabah_id', '=', $user_id)
    //         ->sum('debit');
    //     $saldo = $kredit - $debit;

    //     $tarik = DB::table('tabungans')
    //         ->where('tabungans.nasabah_id', $user_id)
    //         ->get();

    //     if ($nasabah == null) {
    //         return view('admin.bukarek');
    //     } else {
    //         return view('admin.dashboard1', compact(['nasabah', 'saldo', 'tarik']));
    //     }
    // });

    // Default Route
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index']);

    // Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin/dashboardlama', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboardlama');
    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin/laporan', [App\Http\Controllers\DashboardController::class, 'laporansampah']);
    Route::post('/admin/searchlaporan', [App\Http\Controllers\DashboardController::class, 'searchlaporan']);

    Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/admin/adduser', [App\Http\Controllers\UserController::class, 'adduser']);
    Route::post('/admin/storeuser', [App\Http\Controllers\UserController::class, 'storeuser']);
    Route::get('/admin/deluser/{id}', [App\Http\Controllers\UserController::class, 'destroyusr']);
    Route::get('/admin/{id}/edituser', [App\Http\Controllers\UserController::class, 'edituser']);
    Route::put('/admin/edituser/{id}', [App\Http\Controllers\UserController::class, 'updateuser']);

    Route::get('/admin/{id}/changeuserpass', [App\Http\Controllers\UserController::class, 'changeuserpass']);
    Route::get('/admin/{id}/changeuserpassold', [App\Http\Controllers\UserController::class, 'changeuserpassold']);
    Route::post('/admin/updatepass', [App\Http\Controllers\UserController::class, 'updatepass']);

    Route::get('/admin/profile', [App\Http\Controllers\UserController::class, 'profile']);
    Route::get('/admin/profileuser', [App\Http\Controllers\UserController::class, 'profileuser']);
    Route::post('/admin/saveprofile', [App\Http\Controllers\UserController::class, 'saveprofile']);

    Route::get('/admin/nasabah', [App\Http\Controllers\NasabahController::class, 'index']);
    Route::get('/admin/addnasabahold', [App\Http\Controllers\NasabahController::class, 'addnasabahold']);
    Route::get('/admin/addnasabah', [App\Http\Controllers\NasabahController::class, 'addnasabah']);
    Route::post('/admin/storenasabah', [App\Http\Controllers\NasabahController::class, 'storenasabah']);
    Route::get('/admin/delnasabah/{id}', [App\Http\Controllers\NasabahController::class, 'destroynasabah']);
    Route::get('/admin/{id}/editnasabah', [App\Http\Controllers\NasabahController::class, 'editnasabah']);
    Route::put('/admin/updatenasabah/{id}', [App\Http\Controllers\NasabahController::class, 'updatenasabah']);
    // Route::get('/admin/{id}/destroysetor', [App\Http\Controllers\TransaksiController::class, 'destroysetor']);

    Route::get('/admin/petugas', [App\Http\Controllers\PetugasController::class, 'index']);
    Route::get('/admin/addpetugas', [App\Http\Controllers\PetugasController::class, 'addpetugas']);
    Route::post('/admin/storepetugas', [App\Http\Controllers\PetugasController::class, 'storepetugas']);
    Route::get('/admin/delpetugas/{id}', [App\Http\Controllers\PetugasController::class, 'destroypetugas']);
    Route::get('/admin/{id}/editpetugas', [App\Http\Controllers\PetugasController::class, 'editpetugas']);
    Route::put('/admin/updatepetugas/{id}', [App\Http\Controllers\PetugasController::class, 'updatepetugas']);

    Route::get('/admin/setoran', [App\Http\Controllers\TransaksiController::class, 'setoran']);
    Route::get('/admin/penarikan', [App\Http\Controllers\TransaksiController::class, 'penarikan']);

    Route::get('/admin/rewarduser/{id}', [App\Http\Controllers\TransaksiController::class, 'rewarduser']);
    Route::post('/admin/tarikuangpoint', [App\Http\Controllers\TransaksiController::class, 'tarikuangpoint']);
    Route::get('/admin/succesgift/{id}', [App\Http\Controllers\TransaksiController::class, 'viewgift']);

    Route::get('/admin/reward', [App\Http\Controllers\KategoriController::class, 'reward']);
    Route::get('/admin/addreward', [App\Http\Controllers\KategoriController::class, 'addreward']);
    Route::post('/admin/storereward', [App\Http\Controllers\KategoriController::class, 'storereward']);
    Route::get('/admin/dellreward/{id}', [App\Http\Controllers\KategoriController::class, 'destroyreward']);
    Route::get('/admin/{id}/editreward', [App\Http\Controllers\KategoriController::class, 'editreward']);
    Route::post('/admin/updatereward/{id}', [App\Http\Controllers\KategoriController::class, 'updatereward']);

    Route::get('/admin/lokasi', [App\Http\Controllers\LokasiController::class, 'index']);
    Route::get('/admin/addlokasi', [App\Http\Controllers\LokasiController::class, 'addlokasi']);
    Route::post('/admin/storelokasi', [App\Http\Controllers\LokasiController::class, 'storelokasi']);
    Route::get('/admin/dellokasi/{id}', [App\Http\Controllers\LokasiController::class, 'destroylokasi']);
    Route::get('/admin/{id}/editlokasi', [App\Http\Controllers\LokasiController::class, 'editlokasi']);
    Route::post('/admin/updatelokasi', [App\Http\Controllers\LokasiController::class, 'updatelokasi']);

    Route::get('/admin/kategori', [App\Http\Controllers\KategoriController::class, 'index']);
    Route::get('/admin/addkategori', [App\Http\Controllers\KategoriController::class, 'addkategori']);
    Route::post('/admin/storekategori', [App\Http\Controllers\KategoriController::class, 'storekategori']);
    Route::get('/admin/delkategori/{id}', [App\Http\Controllers\KategoriController::class, 'destroykategori']);
    Route::get('/admin/{id}/editkategori', [App\Http\Controllers\KategoriController::class, 'editkategori']);
    Route::put('/admin/updatekategori/{id}', [App\Http\Controllers\KategoriController::class, 'updatekategori']);

    Route::get('/admin/{id}/pilihnasabah', [App\Http\Controllers\TransaksiController::class, 'pilihnasabah']);
    Route::get('/admin/setornasabahold', [App\Http\Controllers\TransaksiController::class, 'setoranNasabahOld']);
    Route::get('/admin/setornasabah/{id?}', [App\Http\Controllers\TransaksiController::class, 'setoranNasabah'])->name('setoranNasabah');

    Route::get('/admin/updatestatus', [App\Http\Controllers\TransaksiController::class, 'setoranNasabah']);

    Route::post('/admin/stortabungan', [App\Http\Controllers\TransaksiController::class, 'stortabungan']);
    Route::get('/admin/{id}/editsetoran', [App\Http\Controllers\TransaksiController::class, 'editsetoran']);

    Route::post('/admin/updatesetoran/{status}', [App\Http\Controllers\TransaksiController::class, 'ubahStatus']);
    Route::get('/admin/delsetoran/{id}', [App\Http\Controllers\TransaksiController::class, 'destroystr']);

    Route::get('/admin/{id}/penarikanuang', [App\Http\Controllers\TransaksiController::class, 'penarikanuang']);
    Route::post('/admin/tarikuang', [App\Http\Controllers\TransaksiController::class, 'tarikuang']);

    Route::get('/admin/lihattabungan', [App\Http\Controllers\TransaksiController::class, 'lihattabungan']);
    Route::get('/peta/json', [App\Http\Controllers\DashboardController::class, 'titikbank']);
});

Route::get('/about', [App\Http\Controllers\UserController::class, 'index']);
