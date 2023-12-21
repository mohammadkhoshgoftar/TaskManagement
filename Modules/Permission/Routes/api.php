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

Route::prefix('roles')
    ->middleware('check.api.auth')
    ->group(function () {
        Route::controller(RoleController::class)->group(function () {
            Route::get('/', 'index')->middleware(['can:index-role']);
            Route::post('/store', 'store')->middleware(['can:store-role']);
            Route::get('/show/{id}', 'show')->middleware(['can:index-role']);
            Route::post('/update/{id}', 'update')->middleware(['can:update-role']);
            Route::delete('/delete/{id}', 'destroy')->middleware(['can:delete-role']);
        });
    });

Route::prefix('permission')
    ->middleware('check.api.auth')
    ->group(function () {
        Route::controller(PermissionController::class)->group(function () {
            Route::get('/', 'index')->middleware(['can:index-permission']);
            Route::get('/update', 'update')->middleware(['can:update-permission']);
            Route::post('/sync', 'assignPermissionsToRole')->middleware(['can:assign-permissions-to-role']);

        });
    });
