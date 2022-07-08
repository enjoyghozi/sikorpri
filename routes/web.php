<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TransaksiController;
use App\Models\User;
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
Route::group(['middleware' => ['auth', 'ceklevel:admin,unit']], function () {
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
    
    
    // anggota
    
    
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');
    Route::get('/exportanggota', [AnggotaController::class, 'anggotaexport'])->name('exportanggota');
Route::post('/importanggota', [AnggotaController::class, 'anggotaimportexcel'])->name('importanggota');
Route::get('/create-anggota', [AnggotaController::class, 'create'])->name('create-anggota');
Route::post('/simpan-anggota', [AnggotaController::class, 'store'])->name('simpan-anggota');
Route::get('/edit-anggota/{id}', [AnggotaController::class, 'edit'])->name('edit-anggota');
Route::post('/update-anggota/{id}', [AnggotaController::class, 'update'])->name('update-anggota');
Route::get('/delete-anggota/{id}', [AnggotaController::class, 'destroy'])->name('delete-anggota');





// Route::get('/anggota', function () {
    //     return view('anggota');
    // });
    
    Route::get('/admin', function () {
        $user = User::all();
        return view('admin.admin', compact('user'));
    });
    
    
    // Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::get('/pembayaran/create-pembayaran', [PembayaranController::class, 'create'])->name('create-pembayaran');
    Route::post('/simpan-pembayaran', [PembayaranController::class, 'store'])->name('simpan-pembayaran');
    Route::get('/show-pembayaran/{id}', [PembayaranController::class, 'show'])->name('show-pembayaran');
    
    
    // Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::post('/simpan-transaksi', [TransaksiController::class, 'store'])->name('simpan-transaksi');
    
    // Riwayat
    Route::get('/riwayat', [TransaksiController::class, 'index'])->name('transaksi');
    Route::post('/simpan-transaksi', [TransaksiController::class, 'store'])->name('simpan-transaksi');
    
    Route::get('/pengaturan', function () {
        return view('pengaturan');
    });
    
    Route::get('/akun', function () {
        return view('akun');
    });
});