<?php

namespace Modules\Task\Interface;

interface TaskRepositoryInterface
{
    public function index($validatedData);
    public function storeToDb($validatedData);
    public function updateToDb($validatedData , $id);
    public function show($id);
    public function deleteToDb($id);

}
