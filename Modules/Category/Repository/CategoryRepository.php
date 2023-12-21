<?php

namespace Modules\Category\Repository;

use Modules\Category\Interface\CategoryRepositoryInterface;
use Modules\Category\Http\Resources\CategoryCollection;
use Modules\Category\Http\Resources\CategoryResource;
use Modules\Category\Models\Category;
use Illuminate\Http\Response;

class CategoryRepository implements CategoryRepositoryInterface
{
    private Category $model;

    public function __construct()
    {
        $this->model = new Category();
    }

    public function index()
    {
        try {

            $model = $this->model->paginate(Request()->per_page <= 30 ? Request()->per_page : 30);
            return new CategoryCollection($model);
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
            $categoryResource = new CategoryResource($model);
            return Response::success(data: $categoryResource);
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
