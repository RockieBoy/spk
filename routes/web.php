<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenilaianController;

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
    return view('content.dashboard');
});
Route::resource('kriterium', App\http\Controllers\KriteriaController::class);

Route::resource('kriterium.subkriterias', App\Http\Controllers\SubkriteriaController::class);

Route::resource('alternatif', App\http\Controllers\AlternatifController::class);



Route::prefix('alternatif/{alternatif}')->group(function () {
    Route::get('penilaians', [PenilaianController::class, 'index'])->name('alternatif.penilaians.index');
    Route::get('penilaians/create', [PenilaianController::class, 'create'])->name('alternatif.penilaians.create');
    Route::post('penilaians', [PenilaianController::class, 'store'])->name('alternatif.penilaians.store');
    Route::get('penilaians/edit', [PenilaianController::class, 'edit'])->name('alternatif.penilaians.edit');
    Route::put('penilaians', [PenilaianController::class, 'update'])->name('alternatif.penilaians.update');
    Route::delete('penilaians', [PenilaianController::class, 'destroy'])->name('alternatif.penilaians.destroy');
});



Route::get('data_hitung', function () {
    return view('content.data_hitung');
});
