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

Route::get('/', function () {
    return view('content.dashboard');
});

Route::get('data_kriteria', function () {
    return view('content.data_kriteria');
});

Route::get('data_sub_kriteria', function () {
    return view('content.data_sub_kriteria');
});

Route::get('data_alternatif', function () {
    return view('content.data_alternatif');
});

Route::get('data_penilaian', function () {
    return view('content.data_penilaian');
});

Route::get('data_hitung', function () {
    return view('content.data_hitung');
});

Route::get('data_hasil', function () {
    return view('content.data_hasil');
});