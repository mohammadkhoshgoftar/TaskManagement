<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Response;
use Modules\Auth\Http\Requests\LoginAdminRequest;
use Modules\Core\Http\Resources\ErrorResource;
use Modules\Auth\Http\Resources\AuthResource;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function login(LoginAdminRequest $request)
    {
        try {
            $data = $request->validated();
            $response = Http::asForm()->post('http://taskmanagment.me/oauth/token', [
                'grant_type' => 'password',
                'client_id' => '2',
                'client_secret' => 'nFA7UHo64vjoj7PscvplAX5vLFc9A64DemSHRwGV',
                'username' => $data['email'],
                'password' => $data['password'],
                'scope' => '',
            ]);

            if (isset($response['access_token']) and $response['access_token']) {
                $user = User::query()->where('email', $request->email)->first();
                $auth['token'] = $response;
                $auth['user'] = $user;
                $message = 'نام کاربری و رمز عبور شما تایید شد';
                $data = new AuthResource($auth);
                return Response::success($message , $data);
            } else {
                $message = 'نام کاربری یا رمز عبور شما نادرست است';

                return Response::error($message , null);
            }
        } catch (\Exception $e) {
            return Response::error($e->getMessage() , null);
        }
    }
}
