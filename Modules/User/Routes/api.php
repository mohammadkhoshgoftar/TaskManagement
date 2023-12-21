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


Route::prefix('user')
    ->middleware('check.api.auth')
    ->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/', 'index')->middleware(['can:index-user']);
            Route::post('/store', 'store')->middleware(['can:store-user']);
            Route::get('/show/{id}', 'show')->middleware(['can:index-user']);
            Route::post('/update/{id}', 'update')->middleware(['can:update-user']);
            Route::delete('/delete/{id}', 'destroy')->middleware(['can:delete-user']);
        });
    });









