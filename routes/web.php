<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubkriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\HasilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Route untuk guest (belum login)
Route::middleware(['guest'])->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('login');
    Route::post('/', [UserController::class, 'login']);
});

// Route untuk user yang sudah login
Route::middleware(['auth'])->group(function() {
    // Redirect ke dashboard setelah login
    Route::get('/home', function() {
        return redirect('/dashboard');
    });

    // Dashboard untuk semua role
    Route::get('/dashboard', function() {
        return view('content.dashboard');
    });

    Route::get('/user', [UserController::class, 'account'])->name('user.account');

    // Route untuk superadmin
    Route::middleware('userAkses:superadmin')->group(function() {
        Route::prefix('adminusers')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('adminusers.index');
            Route::get('/create', [AdminUserController::class, 'create'])->name('adminusers.create');
            Route::post('/', [AdminUserController::class, 'store'])->name('adminusers.store');
            Route::get('/{adminusers}', [AdminUserController::class, 'show'])->name('adminusers.show');
            Route::get('/{adminusers}/edit', [AdminUserController::class, 'edit'])->name('adminusers.edit');
            Route::put('/{adminusers}', [AdminUserController::class, 'update'])->name('adminusers.update');
            Route::delete('/{adminusers}', [AdminUserController::class, 'destroy'])->name('adminusers.destroy');
        });
    });

    // Route untuk dosen
    Route::middleware('userAkses:kaprodi')->group(function() {
        Route::prefix('kriterium')->group(function () {
            Route::get('/', [KriteriaController::class, 'index'])->name('kriterium.index');
            Route::get('/create', [KriteriaController::class, 'create'])->name('kriterium.create');
            Route::post('/', [KriteriaController::class, 'store'])->name('kriterium.store');
            Route::get('/{kriterium}', [KriteriaController::class, 'show'])->name('kriterium.show');
            Route::get('/{kriterium}/edit', [KriteriaController::class, 'edit'])->name('kriterium.edit');
            Route::put('/{kriterium}', [KriteriaController::class, 'update'])->name('kriterium.update');
            Route::delete('/{kriterium}', [KriteriaController::class, 'destroy'])->name('kriterium.destroy');
        });

        Route::prefix('/{kriterium}/subkriterias')->group(function () {
            Route::get('/', [SubkriteriaController::class, 'index'])->name('kriterium.subkriterias.index');
            Route::get('/create', [SubkriteriaController::class, 'create'])->name('kriterium.subkriterias.create');
            Route::post('/', [SubkriteriaController::class, 'store'])->name('kriterium.subkriterias.store');
            Route::get('/{subkriteria}', [SubkriteriaController::class, 'show'])->name('kriterium.subkriterias.show');
            Route::get('/{subkriteria}/edit', [SubkriteriaController::class, 'edit'])->name('kriterium.subkriterias.edit');
            Route::put('/{subkriteria}', [SubkriteriaController::class, 'update'])->name('kriterium.subkriterias.update');
            Route::delete('/{subkriteria}', [SubkriteriaController::class, 'destroy'])->name('kriterium.subkriterias.destroy');
        });

        Route::prefix('alternatif')->group(function () {
            Route::get('/', [AlternatifController::class, 'index'])->name('alternatif.index');
            Route::get('/create', [AlternatifController::class, 'create'])->name('alternatif.create');
            Route::post('/', [AlternatifController::class, 'store'])->name('alternatif.store');
            Route::get('/{alternatif}', [AlternatifController::class, 'show'])->name('alternatif.show');
            Route::get('/{alternatif}/edit', [AlternatifController::class, 'edit'])->name('alternatif.edit');
            Route::put('/{alternatif}', [AlternatifController::class, 'update'])->name('alternatif.update');
            Route::delete('/{alternatif}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');
        });

        Route::resource('perhitungan', PerhitunganController::class)->only(['index']);
        
        Route::prefix('alternatif/{alternatif}')->group(function() {
            Route::get('penilaians', [PenilaianController::class, 'index'])->name('alternatif.penilaians.index');
            Route::get('penilaians/create', [PenilaianController::class, 'create'])->name('alternatif.penilaians.create');
            Route::post('penilaians', [PenilaianController::class, 'store'])->name('alternatif.penilaians.store');
            Route::get('penilaians/edit', [PenilaianController::class, 'edit'])->name('alternatif.penilaians.edit');
            Route::put('penilaians', [PenilaianController::class, 'update'])->name('alternatif.penilaians.update');
            Route::delete('penilaians', [PenilaianController::class, 'destroy'])->name('alternatif.penilaians.destroy');
        });
    });

    // Route untuk mahasiswa
    Route::middleware('userAkses:mahasiswa')->group(function() {
        Route::resource('hasils', HasilController::class)->only(['index']);
    });

    // Route untuk semua role
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});