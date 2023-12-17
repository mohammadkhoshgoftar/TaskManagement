<?php

namespace Modules\Permission\Repository;

use Illuminate\Http\Response;
use Modules\Permission\Http\Resources\RoleCollection;
use Modules\Permission\Http\Resources\RoleResource;
use Modules\Permission\Interface\RollRepositoryInterface;
use Modules\User\Http\Resources\UserCollection;
use Modules\User\Http\Resources\UserResource;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleRepository implements RollRepositoryInterface
{

    private $role;

    public function __construct()
    {
        $this->role = new Role();
    }

    public function getRole($id)
    {
        return $this->role->findOrFail($id);
    }

    public function index()
    {
        try {
            $data = $this->role->get();
            $RoleCollection = new RoleCollection($data);
            return Response::success(data: $RoleCollection);
        } catch (\Exception $exception) {
            return Response::error($exception->getMessage());
        }
    }

    public function storeToDb($validatedData): bool
    {
        try {
            $model = $this->role;
            foreach ($validatedData as $key => $item) {
                $model->{$key} = $item;
            }
            $model->guard_name = 'api';
            $model->save();
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function updateToDb($validatedData, $id): bool
    {
        try {
            $model = $this->role->find($id);
            foreach ($validatedData as $key => $item) {
                $model->{$key} = $item;
            }
            $model->save();
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function show($id)
    {
        try {
            $roleResource = new RoleResource($this->getRole($id));
            return Response::success(data: $roleResource);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return Response::error($message);
        }
    }

    public function deleteToDb($id)
    {
        try {
            $model = $this->role->find($id);
            if ($model) {
                if ($model->users->count())
                    return Response::error('این نقش به کاربرانی اختصاص داده شده است و امکان حذف آن وجود ندارد');
                $model->delete();
                return Response::success('نقش شما با موفقیت حذف شد');
            } else {
                return Response::error('این نقش وجود ندارد');
            }
        } catch (\Exception $exception) {
            return Response::error($exception->getMessage());
        }

    }
}
