<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\User\UserController;
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

Route::group(['namespace' => 'Dashboard', 'middleware' => 'history'], function ($router) {
    $router->get('/home', [DashboardController::class, 'index'])->name('home');
});

Route::group(['namespace' => 'Auth',  'middleware' => 'history'], function ($router) {
    $router->get('/', [AuthController::class, 'login'])->name('login');
});
Route::group(['namespace' => 'User',  'middleware' => 'history'], function ($router) {
    $router->get('/users', [UserController::class, 'index'])->name('index');
});


Route::group(['namespace' => 'Auth'], function ($router) {
    $router->post('/register', [AuthController::class, 'register']);
    $router->post('/checkLogin', [AuthController::class, 'checkLogin']);
    $router->get('/logout', [AuthController::class, 'logout']);
});
