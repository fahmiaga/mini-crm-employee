<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
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


Route::domain('{company}.crm.com')->group(function () {
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
    Route::post('/login-process', [AuthController::class, 'login']);
});

// Route::get('/login', [AuthController::class, 'index']);

Route::middleware('has-session')->group(function () {
    // Route::get('/', function () {
    //     return view('employee.employee');
    // });
    Route::get('/dashboard', [EmployeeController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);
});
