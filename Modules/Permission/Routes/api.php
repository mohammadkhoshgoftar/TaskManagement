<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/permission', function (Request $request) {
    return $request->user();
});

Route::/*middleware('auth:api')
    ->*/prefix('roles')
    ->group(function () {
        Route::controller(RoleController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('/store', 'store');
            Route::get('/show/{id}', 'show');
            Route::post('/update/{id}', 'update');
            Route::delete('/delete/{id}', 'destroy');
        });
    });
