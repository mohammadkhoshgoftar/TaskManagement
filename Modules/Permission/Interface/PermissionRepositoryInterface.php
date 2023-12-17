<?php

namespace Modules\Permission\Interface;

interface PermissionRepositoryInterface
{
    public function index();
    public function updateToDb();

    public function sync($validateData);
}
