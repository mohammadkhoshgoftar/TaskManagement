<?php

namespace Modules\Task\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Category\Http\Resources\CategoryResource;
use Modules\User\Http\Resources\UserResource;

class TaskResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                => $this->id,
            'title'             => $this->title,
            'description'       => $this->description,
            'user'              => new UserResource($this->whenLoaded('user')),
            'order'             => $this->order,
            'status'            => $this->status,
            'category'          => new CategoryResource($this->whenLoaded('category')),
            'deadline'          => verta($this->deadline)->formatDate(),
        ];
    }
}
