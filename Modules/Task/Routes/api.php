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

Route::prefix('task')->group(function () {
    Route::controller(TaskController::class)->group(function () {
        Route::get('/', 'index')->middleware(['can:index-task']);
        Route::post('/store', 'store')->middleware(['can:store-task']);
        Route::get('/show/{id}', 'show')->middleware(['can:index-task']);
        Route::post('/update/{id}', 'update')->middleware(['can:update-task']);
        Route::delete('/delete/{id}', 'destroy')->middleware(['can:delete-task']);
    });
});
