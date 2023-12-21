<?php

namespace Modules\Category\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
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
                return new CategoryResource($item);
            })
        ];
    }

    public function with($request): array
    {
        return [
            'status' => true,
            'message' => 'Fetch successfully',
        ];
    }

}
