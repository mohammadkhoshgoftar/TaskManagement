<?php

namespace Modules\Task\Repository;

use Modules\Task\Interface\TaskRepositoryInterface;
use Modules\Task\Http\Resources\TaskCollection;
use Modules\Task\Http\Resources\TaskResource;
use Modules\Task\Models\Task;
use Illuminate\Http\Response;

class TaskRepository implements TaskRepositoryInterface
{
    private Task $model;

    public function __construct()
    {
        $this->model = new Task();
    }

    public function index()
    {
        try {
            $model = $this->model->with(['user'])->orderByDesc('id')->paginate(Request()->per_page <= 30 ? Request()->per_page : 30);
            return new TaskCollection($model);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return Response::error($message);
        }
    }

    public function storeToDb($validatedData): bool
    {
        try {
            $model = $this->model->create($validatedData);
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function updateToDb($validatedData, $id): bool
    {
        try {
            $model = $this->model->find($id);
            $model->update($validatedData);
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function show($id)
    {
        try {
            $model = $this->model->findOrFail($id);
            $taskResource = new TaskResource($model);
            return Response::success(data: $taskResource);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return Response::error($message);
        }
    }

    public function deleteToDb($id): bool
    {
        try {
            $model = $this->model->find($id);
            if ($model) {
                $model->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $exception) {
            return false;
        }

    }
}
