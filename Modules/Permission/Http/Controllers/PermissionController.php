<?php

namespace Modules\Permission\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Permissions\Repository\RollRepository;

class PermissionController extends Controller
{
    protected $repository;

    public function __construct(RollRepository $repository)
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
            return new GlobalResource($data);
        } else {
            $data = [
                'message' => 'ثبت نام کاربر با خطا روبه رو شد',
            ];
            return new ErrorResource($data);
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
