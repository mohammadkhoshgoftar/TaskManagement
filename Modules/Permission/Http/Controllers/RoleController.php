<?php

namespace Modules\Permission\Http\Controllers;

use Modules\Permission\Http\Requests\UpdateRoleRequest;
use Modules\Permission\Http\Requests\StoreRoleRequest;
use Modules\Permission\Repository\RoleRepository;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    protected $repository;

    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store(StoreRoleRequest $request)
    {
        $result = $this->repository->storeToDb($request->validated());
        if ($result) {
            $message='نفش با موفقیت ثبت نام شد';
            return Response::success($message);
        } else {
            $message = 'ایجاد نفش با خطا روبه رو شد';
            return Response::error($message);
        }
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        $result = $this->repository->updateToDb($request->validated(), $id);
        if ($result) {
            $message = 'اطلاعات کاربر با موفقیت به روزرسانی شد';
            return Response::success($message);
        } else {
            $message = 'به روزررسانی اطلاعات کاربر با خطا روبه رو شد';
            return Response::error($message);
        }
    }

    public function destroy($id)
    {
        return $this->repository->deleteToDb($id);
    }
}
