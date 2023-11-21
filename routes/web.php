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

Route::prefix('/mahasiswa')->group(function () {
    Route::get('/find', [MahasiswaController::class, 'find']);
    Route::get('/where', [MahasiswaController::class, 'where']);
    Route::get('/where-chaining', [MahasiswaController::class, 'whereChaining']);
    Route::get('/all-join', [MahasiswaController::class, 'allJoin']);
    Route::get('/has', [MahasiswaController::class, 'has']);
    Route::get('/where-has', [MahasiswaController::class, 'whereHas']);
    Route::get('/doesnt-have', [MahasiswaController::class, 'doesntHave']);
    Route::get('/where-doesnt-have', [MahasiswaController::class, 'whereDoesntHave']);
    Route::get('/insert-save', [MahasiswaController::class, 'insertSave']);
    Route::get('/insert-create', [MahasiswaController::class, 'insertCreate']);
    Route::get('/update', [MahasiswaController::class, 'update']);
    Route::get('/update-push', [MahasiswaController::class, 'updatePush']);
    Route::get('/update-push-where', [MahasiswaController::class, 'updatePushWhere']);
    Route::get('/delete-find', [MahasiswaController::class, 'deleteFind']);
    Route::get('/delete-where', [MahasiswaController::class, 'deleteWhere']);
    Route::get('/delete-if', [MahasiswaController::class, 'deleteIf']);
    Route::get('/delete-cascade', [MahasiswaController::class, 'deleteCascade']);
    Route::get('/update-cascade', [MahasiswaController::class, 'updateCascade']);
});
