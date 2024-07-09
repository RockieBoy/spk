<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubkriteriaController;


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

Route::resource('kriterium.subkriterias', SubkriteriaController::class);

Route::resource('alternatif', App\http\Controllers\AlternatifController::class);

Route::get('data_penilaian', function () {
    return view('content.data_penilaian');
});

Route::get('data_hitung', function () {
    return view('content.data_hitung');
});
