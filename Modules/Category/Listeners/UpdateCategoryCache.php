<?php

namespace Modules\Category\Listeners;


use Illuminate\Support\Facades\Cache;
use Modules\Category\Events\CategoryDataChanged;
use Modules\Category\Models\Category;

class UpdateCategoryCache
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function created(CategoryDataChanged $event): void
    {
        $this->updateCache($event->categoryId);
    }

    public function updated(CategoryDataChanged $event): void
    {
        $this->updateCache($event->categoryId);
    }

    public function deleted(CategoryDataChanged $event)
    {
        $this->deleteCache($event->categoryId);
    }

    protected function updateCache($categoryId): void
    {
        $newData = Category::query()->find($categoryId);

        $cacheKey = "category:$categoryId";

        Cache::put($cacheKey, $newData, 120);
    }

    protected function deleteCache($categoryId): void
    {
        $cacheKey = "category:$categoryId";
        Cache::forget($cacheKey);
    }
}
