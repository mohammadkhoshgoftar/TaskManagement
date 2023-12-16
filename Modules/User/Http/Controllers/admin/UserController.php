<?php

namespace Modules\User\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Resources\ErrorResource;
use Modules\Core\Http\Resources\GlobalResource;
use Modules\User\Http\Requests\Admin\StoreUserRequest;
use Modules\User\Http\Requests\Admin\UpdateUserRequest;
use Modules\User\Repository\UserRepository;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store(StoreUserRequest $request)
    {
        $result = $this->repository->storeToDb($request->validated());
        if ($result) {
            $data = [
                'message' => 'کاربر با موفقیت ثبت نام شد',
            ];
            return Response::success('Post created', $result);
        } else {
            $data = [
                'message' => 'ثبت نام کاربر با خطا روبه رو شد',
            ];
            return Response::error('Post created', $result);
        }
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $result = $this->repository->updateToDb($request->validated(), $id);
        if ($result) {
            $data = [
                'message' => 'اطلاعات کاربر با موفقیت به روزرسانی شد',
            ];
            return new GlobalResource($data);
        } else {
            $data = [
                'message' => 'به روزررسانی اطلاعات کاربر با خطا روبه رو شد',
            ];
            return new ErrorResource($data);
        }
    }

    public function destroy($id)
    {
        return $this->repository->deleteToDb($id);
    }
}
