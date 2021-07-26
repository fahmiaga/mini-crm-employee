<?php

use App\Http\Controllers\AuthController;
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



Route::get('/login', [AuthController::class, 'index']);
Route::post('/login-process', [AuthController::class, 'login']);

Route::middleware('has-session')->group(function () {
    Route::get('/', function () {
        return view('employee.employee');
    });
    Route::view('/dashboard', 'dashboard');
    Route::get('/logout', [AuthController::class, 'logout']);
});
