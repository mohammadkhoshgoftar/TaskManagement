<?php

namespace Modules\Permission\Http\Controllers;


use Illuminate\Http\Response;
use Modules\Permission\Repository\PermissionRepository;
use Illuminate\Routing\Controller;

class PermissionController extends Controller
{
    protected $repository;

    public function __construct(PermissionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function update()
    {
        $result = $this->repository->updateToDb();

        if ($result) {
            $message = 'سطح دسترسی ها با موفقیت به روزرسانی شد';
            return Response::success($message);
        } else {
            $message = 'به روزررسانی سطح دسترسی ها با خطا روبه رو شد';
            return Response::error($message);
        }
    }

}
