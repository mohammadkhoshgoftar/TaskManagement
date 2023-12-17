<?php

namespace Modules\Task\Http\Controllers;

use Illuminate\Http\Response;
use Modules\Task\Http\Requests\UpdateTaskRequest;
use Modules\Task\Http\Requests\StoreTaskRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Task\Repository\TaskRepository;

class TaskController extends Controller
{

    private $repository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->repository = $taskRepository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store(StoreTaskRequest $request)
    {
        $result = $this->repository->storeToDb($request->validated());
        if ($result) {
            $message = 'تسک با موفقیت ثبت شد';
            return Response::success($message);
        } else {
            $message = 'ثبت تسک با خطا روبه رو شد';
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
        return $this->repository->deleteToDb($id);
    }
}
