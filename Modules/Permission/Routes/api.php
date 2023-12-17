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

Route::/*middleware('auth:api')
    ->*/prefix('permission')
    ->group(function () {
        Route::controller(PermissionController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('/store', 'store');
            Route::get('/show/{id}', 'show');
            Route::get('/update', 'update');
            Route::delete('/delete/{id}', 'destroy');
        });
    });
