<?php

use App\Http\Controllers\MahasiswaController;
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
    return view('welcome');
});

Route::get('/mahasiswa/all', [MahasiswaController::class, 'all']);
Route::get('/mahasiswa/gabung-1', [MahasiswaController::class, 'gabung1']);
Route::get('/mahasiswa/gabung-2', [MahasiswaController::class, 'gabung2']);
Route::get('/mahasiswa/gabung-join-1', [MahasiswaController::class, 'gabungJoin1']);
Route::get('/mahasiswa/gabung-join-2', [MahasiswaController::class, 'gabungJoin2']);
Route::get('/mahasiswa/gabung-join-3', [MahasiswaController::class, 'gabungJoin3']);
