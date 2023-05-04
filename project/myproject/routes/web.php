<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;

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


Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/dashboard',[DashboardController::class, 'index']);
    Route::get('/',[DashboardController::class, 'index']);

    #method karyawan
    Route::get('/karyawan',[KaryawanController::class, 'index']);
    Route::post('/karyawan/create',[KaryawanController::class, 'create']);
    Route::get('/karyawan/{id}/edit',[KaryawanController::class, 'edit']);
    Route::get('/karyawan/{id}/delete',[KaryawanController::class, 'delete']);
    Route::post('/karyawan/{id}/update',[KaryawanController::class, 'update']);
});