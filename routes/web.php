<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::group(['middleware' => ['role:owner|kasir']], function () {
//     Route::get('/dashboard', function () {
//         return view('owner.index');
//     })->middleware(['auth', 'verified'])->name('dashboard');
// });




Route::middleware('auth')->group(function () {

    Route::group(['middleware' => ['role:owner|manajer|supervisor'],],function () {
      
    });
    
    Route::group(['middleware' => ['role:kasir|manajer|supervisor'],],function () {
        Route::get('/kasir', [KasirController::class, 'index'])->name('kasir');
        Route::post('/storeTransaksi', [KasirController::class, 'storeTransaksi'])->name('kasir.storeTransaksi');
        Route::get('/detailTransaksi', [KasirController::class, 'detailTransaksi'])->name('kasir.detailTransaksi');
        Route::post('/storeDetailTransaksi', [KasirController::class, 'storeDetailTransaksi'])->name('kasir.storeDetailTransaksi');
        Route::post('/bayarTransaksi', [KasirController::class, 'bayarTransaksi'])->name('kasir.bayarTransaksi');
        Route::get('/detailTransaksi/cetak', [KasirController::class, 'cetak'])->name('kasir.cetak');
    });

    Route::group(['middleware' => ['role:pegawai gudang|manajer'],],function () {
        Route::get('/gudang', [GudangController::class, 'index'])->name('gudang');
        Route::get('/gudang/create', [GudangController::class, 'create'])->name('barang.create');
        Route::post('/store', [GudangController::class, 'store'])->name('barang.store');
        Route::get('/edit', [GudangController::class, 'edit'])->name('barang.edit');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
