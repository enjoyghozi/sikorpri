<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TaliasihController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BayarTaliasihController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PurnatugasController;

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


// login & logout
Route::get('/login', [LoginController::class, 'halamanLogin'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Registrasi
Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
Route::post('/simpanregistrasi', [LoginController::class, 'simpanregistrasi'])->name('simpanregistrasi');

// home
Route::group(['middleware' => ['auth', 'ceklevel:admin,unit,superadmin']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    // unit
    Route::get('/unit', [UnitController::class, 'index'])->name('unit');
    Route::get('/exportunit', [UnitController::class, 'unitexport'])->name('exportunit');
    Route::post('/importunit', [UnitController::class, 'unitimportexcel'])->name('importunit');
    Route::get('/create-unit', [UnitController::class, 'create'])->name('create-unit');
    Route::post('/simpan-unit', [UnitController::class, 'store'])->name('simpan-unit');
    Route::get('/edit-unit/{id}', [UnitController::class, 'edit'])->name('edit-unit');
    Route::post('/update-unit/{id}', [UnitController::class, 'update'])->name('update-unit');
    Route::get('/delete-unit/{id}', [UnitController::class, 'destroy'])->name('delete-unit');
    Route::get('/show-unit/{id}', [UnitController::class, 'show'])->name('show-unit');
    Route::get('/cetak-unit', [UnitController::class, 'cetakUnit'])->name('cetak-unit');
    Route::get('/cetak-anggotaperunit/{id}', [UnitController::class, 'cetakAnggotaperunit'])->name('cetak-anggotaperunit');
    
    
    // anggota
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');
    Route::get('/exportanggota', [AnggotaController::class, 'anggotaexport'])->name('exportanggota');
    Route::post('/importanggota', [AnggotaController::class, 'anggotaimportexcel'])->name('importanggota');
    Route::get('/create-anggota', [AnggotaController::class, 'create'])->name('create-anggota');
    Route::post('/simpan-anggota', [AnggotaController::class, 'store'])->name('simpan-anggota');
    Route::get('/edit-anggota/{id}', [AnggotaController::class, 'edit'])->name('edit-anggota');
    Route::post('/update-anggota/{id}', [AnggotaController::class, 'update'])->name('update-anggota');
    Route::get('/delete-anggota/{id}', [AnggotaController::class, 'destroy'])->name('delete-anggota');
    Route::get('/cetak-anggota', [AnggotaController::class, 'cetakAnggota'])->name('cetak-anggota');


    // Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/edit-admin/{id}', [AdminController::class, 'edit'])->name('edit-admin');
    Route::post('/update-admin/{id}', [AdminController::class, 'update'])->name('update-admin');
    Route::get('/delete-user/{id}', [AdminController::class, 'destroy'])->name('delete-user');

    
    
    // Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::get('/pembayaran/create-pembayaran', [PembayaranController::class, 'create'])->name('create-pembayaran');
    Route::post('/simpan-pembayaran', [PembayaranController::class, 'store'])->name('simpan-pembayaran');
    Route::get('/show-pembayaran/{id}', [PembayaranController::class, 'show'])->name('show-pembayaran');

    //taliasih
    Route::post('/simpan-daftar', [BayarTaliasihController::class, 'store'])->name('simpan-daftar');
    Route::get('/bayartaliasih', [BayarTaliasihController::class, 'index'])->name('bayartaliasih');
    Route::get('/bayartaliasih/create-bayartaliasih', [BayarTaliasihController::class, 'create'])->name('create-bayartaliasih');


    Route::get('/taliasih', [TaliasihController::class, 'index'])->name('taliasih');
    Route::get('/create-taliasih', [TaliasihController::class, 'create'])->name('create-taliasih');
    Route::post('/simpan-taliasih', [TaliasihController::class, 'store'])->name('simpan-taliasih');
    Route::get('/delete-taliasih/{id}', [TaliasihController::class, 'destroy'])->name('delete-taliasih');
    Route::get('/cetak-taliasihpertanggal/{tglawal}/{tglakhir}', [TaliasihController::class, 'cetakTaliasihPertanggal'])->name('cetak-taliasihpertanggal');

    
    
    // Transaksi
    Route::get('/transaksi-iuranwajib', [TransaksiController::class, 'index'])->name('transaksi-iuranwajib');
    Route::post('/simpan-transaksi', [TransaksiController::class, 'store'])->name('simpan-transaksi');
    Route::get('/cetak-transaksipertanggal/{tglawal}/{tglakhir}', [TransaksiController::class, 'cetakTransaksiPertanggal'])->name('cetak-transaksipertanggal');
    Route::get('/transaksi-taliasih', [TransaksiController::class, 'transaksiTaliasih'])->name('transaksi-iuranwajib');

    
    // Riwayat
    Route::get('/riwayat-iuranwajib', [TransaksiController::class, 'riwayat'])->name('riwayat-iuranwajib');
    Route::get('/riwayat-taliasih', [TaliasihController::class, 'index'])->name('riwayat-taliasih');
    Route::post('/simpan-transaksi', [TransaksiController::class, 'store'])->name('simpan-transaksi');
    Route::get('/delete-transaksi/{id}', [TransaksiController::class, 'destroy'])->name('delete-transaksi');

    // Purnatugas
    Route::get('/purnatugas', [PurnatugasController::class, 'index'])->name('purnatugas');
    Route::post('/simpan-purna', [PurnatugasController::class, 'store'])->name('simpan-purna');
    Route::get('/cetak-purnatugaspertanggal/{tglawal}/{tglakhir}', [PurnatugasController::class, 'cetakPurnatugasPertanggal'])->name('cetak-purnatugaspertanggal');


    Route::get('/pengaturan', function () {
        return view('pengaturan');
    });
    
    Route::get('/akun', function () {
        return view('akun');
    });
});