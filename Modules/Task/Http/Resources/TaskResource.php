<?php

namespace Modules\Task\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\User\Http\Resources\UserResource;

class TaskResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                => $this->id,
            'title'             => $this->title,
            'description'       => $this->description,
            'user_id'           => $this->user_id,
            'user'              => new UserResource($this->whenLoaded('user')),
            'order'             => $this->order,
            'status'            => $this->status,
            'deadline'          => verta($this->deadline)->formatDate(),
        ];
    }
}
