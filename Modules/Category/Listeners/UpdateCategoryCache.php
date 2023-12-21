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

    public function handle(CategoryDataChanged $event)
    {
        $newData = Category::all();
        $cacheKey = "categories";
        Cache::put($cacheKey, $newData, 120);
    }


}
