<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KehadiranController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('pages.dashboard', [
        "title" => "Dashboard",
    ]);
});

Route::get('/AdminDashboard', function () {
    return view('pages.AdminDashboard', [
        "title" => "Admin Dashboard"
        // [DashboardController::class, 'index']
    ]);
});

Route::get('/SuperAdminDashboard', function () {
    return view('pages.SuperAdminDashboard', [
        "title" => "Super Admin Dashboard"
        // [DashboardController::class, 'index']
    ]);
});

Route::get('/kehadiran', function () {
    return view('pages.inputkehadiran', [
        "title" => "Input Kehadiran",
        [KehadiranController::class, 'index']
    ]);
});

Route::get('/help', function () {
    return view('pages.help', [
        "title" => "Help"
        // [DashboardController::class, 'index']
    ]);
});

Route::get('/login', function () {
    return view('pages.login', [
        "title" => "Login"
        // [LoginController::class, 'index']
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
