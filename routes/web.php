<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HelpController;
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

Route::get('/', [DashboardController::class, 'show']);

Route::get('/dashboard', [DashboardController::class, 'show']);

Route::get('/AdminDashboard', [AdminDashboardController::class, 'show']);

Route::get('/SuperAdminDashboard', [SuperAdminDashboardController::class, 'show']);

Route::get('/kehadiran', [KehadiranController::class, 'input']);

Route::get('/help', [HelpController::class, 'show']);

Route::get('/login', [LoginController::class, 'input']);

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';