<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PeminjamanController;
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

Route::get('/', function(){return redirect('/dashboard');});
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/hubungi', function(){return view('dashboard.hubungi');});
Route::get('/panduan', function(){return view('dashboard.panduan');});

Route::get('/peminjaman', [PeminjamanController::class, 'create']);
Route::post('/peminjaman', [PeminjamanController::class, 'store']);
Route::get('/pengembalian', [PeminjamanController::class, 'index']);
Route::post('/pengembalian', [PeminjamanController::class, 'update']);
Route::get('/riwayat', [PeminjamanController::class, 'history']);

//Export
Route::get('/export-excel', [ExportController::class, 'exportexcel']);