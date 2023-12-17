<?php

namespace Modules\Permission\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PermissionCollection extends ResourceCollection
{

    public function toArray($request): array
    {
        return [
            $this->collection->map(function ($item) {
                return new PermissionResource($item);
            })
        ];
    }
}
