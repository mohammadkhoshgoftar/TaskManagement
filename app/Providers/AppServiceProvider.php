<?php

namespace App\Providers;

use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function($message = 'Information received successfully', $data = null) {
            return response()->json([
                'status' => true,
                'message' => $message,
                'data' => $data,
            ]);
        });

        Response::macro('error', function($message, $data = null, $code = 500) {
            return response()->json([
                'status' => false,
                'error' => $message,
                'data' => $data,
            ], $code);
        });
    }
}
