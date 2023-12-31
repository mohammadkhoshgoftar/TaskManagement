<?php

namespace Modules\User\Repository;

use Modules\User\Interface\UserRepositoryInterface;
use Modules\User\Http\Resources\UserCollection;
use Modules\User\Http\Resources\UserResource;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Response;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    private User $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function index()
    {
        try {
            $model = $this->model->orderByDesc('id')->paginate(Request()->per_page <= 30 ? Request()->per_page : 30);
            return new UserCollection($model);
//            return Response::success(data:$userCollection);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            Response::error($message);
        }
    }

    public function storeToDb($validatedData)
    {
        try {
            $role = Role::query()->find($validatedData['role_id']);
            unset($validatedData['role_id']);
            $model = $this->model->create($validatedData);
            $model->assignRole($role);
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function updateToDb($validatedData, $id)
    {
        try {
            $model = $this->model->find($id);
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
            $model = $this->model->findOrFail($id);
            $userResource = new UserResource($model);
            return Response::success(data:$userResource);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return Response::error($message);
        }
    }

    public function deleteToDb($id)
    {
        try {
            $model = $this->model->find($id);
            if ($model) {
                $model->delete();
                $message = 'کاربر با موفقیت حذف شد';
                return Response::success($message);
            }else{
                $message = 'این کاربر وجود ندارد';
                return Response::error($message);
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return Response::error($message);
        }

    }
}
