<?php

namespace Modules\Auth\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\User\Http\Resources\UserResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'token' => $this['token']['access_token'],
            'refresh_token' => $this['token']['refresh_token'],
            'expire_In' => $this['token']['expires_in'],
            'user' => new UserResource($this['user']),
        ];
    }
}
