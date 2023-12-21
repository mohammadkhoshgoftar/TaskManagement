<?php

namespace Modules\Category\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CategoryDataChanged
{
    use Dispatchable, SerializesModels;

    public $categoryId;

    public function __construct($category)
    {
        $this->categoryId = $category->id;
    }
}
