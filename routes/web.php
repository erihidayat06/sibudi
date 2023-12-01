<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BukaFiturController;
use App\Models\LaporanSemester;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanAkhirController;
use App\Http\Controllers\UpdateProfilController;
use App\Http\Controllers\ProfilSingkatController;
use App\Http\Controllers\KanalPengaduanController;
use App\Http\Controllers\LaporanSemesterController;

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
    return view('index');
})->middleware('auth');

Route::resource('/laporan-semester', LaporanSemesterController::class)->middleware('n_admin');
Route::get('/laporan-semester-admin', [LaporanSemesterController::class, 'admin'])->middleware('admin');
Route::get('/export-laporan-semester', [LaporanSemesterController::class, 'laporanExcel'])->middleware('admin');

Route::resource('/laporan-akhir', LaporanAkhirController::class)->middleware('n_admin');
Route::get('/laporan-akhir-admin', [LaporanAkhirController::class, 'admin'])->middleware('admin');
Route::get('/export-laporan-akhir-tahun', [LaporanAkhirController::class, 'laporanExcel'])->middleware('admin');

Route::resource('/kanal-pengaduan', KanalPengaduanController::class)->middleware('n_admin');
Route::get('/kanal-pengaduan-admin', [KanalPengaduanController::class, 'admin'])->middleware('admin');
Route::get('/export-kanal', [KanalPengaduanController::class, 'laporanExcel'])->middleware('admin');

Route::resource('/update-profil', UpdateProfilController::class)->middleware('n_admin');
Route::get('/update-profil-admin', [UpdateProfilController::class, 'admin'])->middleware('admin');
Route::get('/export-update-profil', [UpdateProfilController::class, 'laporanExcel'])->middleware('admin');

Route::get('/login-admin', [LoginController::class, 'index']);
Route::post('/login-admin', [LoginController::class, 'authenticate']);

Route::get('buka-fitur', [BukaFiturController::class, 'index'])->middleware('admin');
Route::put('buka-fitur/{bukaFitur:id}', [BukaFiturController::class, 'update'])->middleware('admin');

Route::delete('/register/{user:id}', [RegisterController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
