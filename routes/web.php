<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HomeController;
use App\Models\Users;

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
    $data['dokter'] = Users::with('jadwal')->where('role', 'dokter')->get();
    return view('welcome', $data);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dokter', [DokterController::class, 'index']);
    Route::get('/tambah-dokter', [DokterController::class, 'tambah']);
    Route::post('/dokter-add', [DokterController::class, 'insert']);
    Route::delete('/dokter/{id}', [DokterController::class, 'delete']);
    Route::get('/dokter-edit/{id}', [DokterController::class, 'edit']);
    Route::post('/dokter-update', [DokterController::class, 'update']);

    Route::post('/dokter-jadwal/{id}', [DokterController::class, 'jadwal']);
    Route::get('/buat-jadwal/{id}', [HomeController::class, 'buatjadwal']);
    Route::post('/jadwal-add', [HomeController::class, 'insertjadwal']);
    Route::get('/cetak/{id}', [HomeController::class, 'cetak']);
});
