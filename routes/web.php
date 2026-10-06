<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PublikController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\HomeContentController;
use App\Http\Controllers\admin\DesainController;
use App\Http\Controllers\admin\ToolsController;
use App\Http\Controllers\admin\KaryaController;

Route::get('/', [DataController::class, 'app']);

// // Route login (TIDAK di-protect, biar bisa diakses buat login)
// Route::get('admin/login', [AuthController::class, 'login'])->name('admin.login');
// Route::post('admin/login', [AuthController::class, 'authenticate'])->name('admin.login.post');
// Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// // Semua route admin lain di-protect middleware admin.auth
// Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {

//     Route::get('/', function () {
//         return view('admin.dashboard');
//     })->name('dashboard');

//     Route::resource('fotografi', FotografiController::class);
//     Route::resource('gear', GearController::class);
//     Route::resource('tools', ToolsController::class);
//     Route::resource('karya', KaryaController::class);

//     Route::get('home', [HomeContentController::class, 'edit'])->name('home.edit');
//     Route::put('home', [HomeContentController::class, 'update'])->name('home.update');
// });