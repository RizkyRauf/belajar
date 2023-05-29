<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;

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


#method login
Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::get('/logout',[AuthController::class, 'logout']);
Route::post('/postlogin',[AuthController::class, 'postlogin']);


#method untyuk karyawan
Route::group(['middleware' => 'auth'], function(){
    
    #Route Change Password
    Route::get('/change-password', [AuthController::class, 'changePassword']);
    Route::post('/change-password',[AuthController::class, 'updatePassword']);
    
    Route::get('/dashboard',[DashboardController::class, 'index']);
    Route::get('/',[DashboardController::class, 'index']);
    
    #method karyawan
    Route::get('/karyawan',[KaryawanController::class, 'index']);
    Route::post('/karyawan/create',[KaryawanController::class, 'create']);
    Route::get('/karyawan/{id}/edit',[KaryawanController::class, 'edit']);
    Route::post('/karyawan/{id}/update',[KaryawanController::class, 'update']);
    Route::get('/karyawan/{id}/delete',[KaryawanController::class, 'delete']);
    
    #route import
    Route::post('/karyawan/import', [KaryawanController::class, 'import'])->name('karyawan.import');
    Route::post('/karyawan/export', [KaryawanController::class, 'export'])->name('karyawan.export');


    # Route Cuti
    Route::get('/cuti', [CutiController::class, 'index']);
    Route::get('/form/cuti', [CutiController::class, 'formcuti']);
    Route::post('/form/cuti', [CutiController::class, 'storecuti']);
    Route::get('/cuti/{id}/edit', [CutiController::class, 'edit']);
    Route::post('/cuti/{id}/update', [CutiController::class, 'update']);

    //Route profile
    Route::get('/karyawan/profile/{nik}', [KaryawanController::class, 'profile']);
});