<?php

namespace Modules\Permission\Repository;

use Modules\Permission\Interface\PermissionRepositoryInterface;
use Modules\Permission\Http\Resources\PermissionCollection;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Response;

class PermissionRepository implements PermissionRepositoryInterface
{
    private Permission $permission;

    public function __construct()
    {
        $this->permission = new Permission();
    }

    public function index()
    {
        try {
            $data = $this->permission->get();
            $permissionCollection = new PermissionCollection($data);
            return Response::success(data: $permissionCollection);
        } catch (\Exception $exception) {
            return Response::error($exception->getMessage());
        }
    }

    public function updateToDb()
    {
        try {
            foreach (getModulesName() as $module) {
                if (config(strtolower($module) . '.permissions')) {
                    foreach (config(strtolower($module) . '.permissions') as $item) {
                        if ($this->permission->where('name', $item)->first() == null) {
                            $newPermission = new Permission();
                            $newPermission->name = $item;
                            $newPermission->guard_name = 'api';
                            $newPermission->save();
                        }
                    }
                }
            }
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
