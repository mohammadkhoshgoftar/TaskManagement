<?php

use Nwidart\Modules\Facades\Module;

if (!function_exists('getModulesName')) {
    function getModulesName(): array
    {
        return array_keys(Module::all());
    }
}
