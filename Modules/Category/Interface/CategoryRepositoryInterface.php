<?php

namespace Modules\Category\Interface;

interface CategoryRepositoryInterface
{
    public function index();
    public function storeToDb($validatedData);
    public function updateToDb($validatedData , $id);
    public function show($id);
    public function deleteToDb($id);

}
