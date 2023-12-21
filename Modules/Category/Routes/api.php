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

Route::prefix('category')
    ->middleware('check.api.auth')
    ->group(function () {
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/', 'index')->middleware(['can:index-category']);
            Route::post('/store', 'store')->middleware(['can:store-category']);
            Route::get('/show/{id}', 'show')->middleware(['can:index-category']);
            Route::post('/update/{id}', 'update')->middleware(['can:update-category']);
            Route::delete('/delete/{id}', 'destroy')->middleware(['can:delete-category']);
        });
    });
