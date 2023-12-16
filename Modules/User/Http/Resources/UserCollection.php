<?php

namespace Modules\User\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request): array
    {
        return [
            $this->collection->map(function ($item) {
                return new UserResource($item);
            })
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
            'message' => 'Fetch successfully',
        ];
    }

}