<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Middleware\ValidateAdmin;
use App\Models\siswa;

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

// Route::get('/', function () {
//     return view('dashboard');
// })->name('dashboard')->middleware(ValidateAdmin::class);
Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware(ValidateAdmin::class);

Route::get('/user', [UserDashboardController::class, 'userdashboard'])->name('userdashboard');
Route::post('/absen', [UserDashboardController::class, 'absen'])->name('absen')->middleware(ValidateAdmin::class);
Route::get('/rekap', [RekapController::class, "index"])->name('rekap')->middleware(ValidateAdmin::class);

Route::resource('siswa', SiswaController::class)->middleware(ValidateAdmin::class);

Route::get('/sesi', [SessionController::class, 'index'])->name('sesi');
Route::post('/sesi/login', [SessionController::class, 'login'])->name('login');
Route::get('/sesi/logout', [SessionController::class, 'logout'])->name('logout');
Route::get('/sesi/register', [SessionController::class, 'register'])->name('register');
Route::post('/sesi/create', [SessionController::class, 'create'])->name('create');