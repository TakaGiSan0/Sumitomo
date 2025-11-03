<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CheckpointController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\RobotController;
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
    return redirect('/login');
});
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('proses_login', [LoginController::class, 'proses_login'])->name('proses_login');


// metode nya get lalu masukkan namespace AuthController 
// attribute name merupakan penamaan dari route yang kita buat
// kita tinggal panggil fungsi route(name) pada layout atau controller

Route::get('logout', [LoginController::class, 'logout'])->name('logout');


// Rute untuk halaman admin
Route::middleware(['auth', 'cek:admin'])->group(function () {
    Route::get('/admin/operator', function () {
        return view('admin.operator');
    })->name('admin.operator');

    Route::get('admin/operator', [OperatorController::class, 'index'])->name('admin.operator.index');
    Route::get('admin/checkpoint', [CheckpointController::class, 'index'])->name('admin.checkpoint.index');
    Route::get('admin/robot', [RobotController::class, 'index'])->name('admin.robot.index');

    Route::post('admin/operator', [OperatorController::class, 'store'])->name('admin.operator.store');
    Route::post('admin/checkpoint', [CheckpointController::class, 'store'])->name('admin.checkpoint.store');
    Route::post('admin/robot', [RobotController::class, 'store'])->name('admin.robot.store');

    Route::put('admin/operator/{id}', [OperatorController::class, 'update'])->name('admin.operator.update');
    Route::put('admin/checkpoint/{id}', [CheckpointController::class, 'update'])->name('admin.checkpoint.update');
    Route::put('admin/robot/{id}', [RobotController::class, 'update'])->name('admin.robot.update');

    Route::delete('admin/operator/{user}', [OperatorController::class, 'destroy'])->name('admin.operator.destroy');
    Route::delete('admin/checkpoint/{checkpoint}', [CheckpointController::class, 'destroy'])->name('admin.checkpoint.destroy');
    Route::delete('admin/robot/{robot}', [RobotController::class, 'destroy'])->name('admin.robot.destroy');
});

// Rute untuk halaman operator
Route::middleware(['auth', 'cek:operator'])->group(function () {
    Route::get('/operator/dashboard', function () {
        return view('operator.dashboard');
    })->name('operator/dashboard');
    Route::get('operator/dashboard', [OperatorController::class, 'operator'])->name('operator/dashboard');
});
