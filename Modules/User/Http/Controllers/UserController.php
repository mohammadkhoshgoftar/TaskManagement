<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\StoreUserRequest;
use Modules\User\Http\Requests\UpdateUserRequest;
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
            $message = 'کاربر با موفقیت ثبت نام شد';
            return Response::success($message);
        } else {
            $message = 'ثبت نام کاربر با خطا روبه رو شد';
            return Response::error($message);
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
            $message = 'اطلاعات کاربر با موفقیت به روزرسانی شد';
            return Response::success($message);
        } else {
            $message = 'به روزررسانی اطلاعات کاربر با خطا روبه رو شد';
            return Response::error($message);        }
    }

    public function destroy($id)
    {
        return $this->repository->deleteToDb($id);
    }
}
