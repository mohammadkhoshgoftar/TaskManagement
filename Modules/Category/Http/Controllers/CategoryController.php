<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Category\Http\Requests\StoreCategoryRequest;
use Modules\Category\Repository\CategoryRepository;
use Modules\Task\Http\Requests\FilterTaskRequest;
use Modules\Task\Http\Requests\UpdateTaskRequest;

class CategoryController extends Controller
{

    private $repository;

    public function __construct(CategoryRepository $taskRepository)
    {
        $this->repository = $taskRepository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store(StoreCategoryRequest $request)
    {
        $result = $this->repository->storeToDb($request->validated());
        if ($result) {
            $message = 'دسته بندی با موفقیت ثبت شد';
            return Response::success($message);
        } else {
            $message = 'ثبت دسته بندی با خطا روبه رو شد';
            return Response::error($message);
        }
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $result = $this->repository->updateToDb($request->validated(), $id);
        if ($result) {
            $message = 'اطلاعات تسک با موفقیت به روزرسانی شد';
            return Response::success($message);
        } else {
            $message = 'به روزررسانی تسک با خطا روبه رو شد';
            return Response::error($message);
        }
    }

    public function destroy($id)
    {
        $result = $this->repository->deleteToDb($id);
        if ($result){
            $message = 'تسک با موفقیت حذف شد';
            return Response::success($message);
        }else{
            $message = 'حذف تست با خطا روبه رو شد';
            return Response::error($message);
        }
    }
}
