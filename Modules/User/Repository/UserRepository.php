<?php

namespace Modules\User\Repository;

use App\Models\User;
use Modules\Core\Http\Resources\ErrorResource;
use Modules\Core\Http\Resources\GlobalResource;
use Modules\User\Http\Resources\UserCollection;
use Modules\User\Http\Resources\UserResource;
use Modules\User\Interface\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        try {
            $model = User::query()->orderByDesc('id')->paginate(Request()->per_page <= 30 ? Request()->per_page : 30);
            return new UserCollection($model);
        } catch (\Exception $exception) {
            return new ErrorResource([
                'message' => $exception->getMessage(),
            ]);
        }
    }

    public function storeToDb($validatedData)
    {
        try {
            $model = new User();
            foreach ($validatedData as $key => $item) {
                $model->{$key} = $item;
            }
            $model->save();
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function updateToDb($validatedData, $id)
    {
        try {
            $model = User::query()->find($id);
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
            return new UserResource(User::query()->findOrFail($id));
        } catch (\Exception $exception) {
            return new ErrorResource([
                'message' => $exception->getMessage(),
            ]);
        }
    }

    public function deleteToDb($id)
    {
        try {
            $model = User::query()->find($id);
            if ($model) {
                $model->delete();
                return new GlobalResource([
                    'message' => 'کاربر با موفقیت حذف شد',
                ]);
            }else{
                return new GlobalResource([
                   'message' => 'این کاربر وجود ندارد'
                ]);
            }
        } catch (\Exception $exception) {
            return new ErrorResource([
                'message' => $exception->getMessage(),
            ]);
        }

    }
}