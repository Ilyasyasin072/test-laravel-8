<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserDetail\UserDetailController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return 'ini';
// });

Route::group(['prefix' => 'v1'], function($router) {

    $router->group(['namespace' => 'Auth', 'prefix' => 'users'], function($router) {
        $router->get('/', [AuthController::class, 'index_data']);
    });

    $router->group(['namespace' => 'UserDetail', 'prefix' => 'manage/users'], function($router) {
        $router->get('/', [UserDetailController::class, 'index_data']);
        $router->post('/store', [UserDetailController::class, 'store'])->name('manage-store');
        $router->put('/update/{id}', [UserDetailController::class, 'update']);
        $router->get('/show/{id}', [UserDetailController::class, 'show']);
        $router->delete('/delete/{id}', [UserDetailController::class, 'delete']);
    });
});
