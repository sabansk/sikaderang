<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\SuperAdminDashboardController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HelpUserController;
use App\Http\Controllers\HelpAdminController;
use App\Http\Controllers\HelpSuperAdminController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [LoginController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/kehadiran', [KehadiranController::class, 'store']);
Route::get('/result', [KehadiranController::class, 'store']);


Route::get('/dashboard', [DashboardController::class, 'show'])->middleware('auth');
Route::get('/admin', [AdminDashboardController::class, 'show']);

Route::get('/superAdmin', [SuperAdminDashboardController::class, 'index']);

Route::get('/kehadiran', [KehadiranController::class, 'input']);

Route::get('/helpUser', [HelpUserController::class, 'show']);

Route::get('/helpAdmin', [HelpAdminController::class, 'show']);

Route::get('/helpSuperAdmin', [HelpSuperAdminController::class, 'show']);

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';