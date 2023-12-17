<?php

use Hekmatinasser\Verta\Verta;

if (!function_exists('jalaliToGregorian')) {
    function jalaliToGregorian($data): string
    {
        $arr = explode('-', $data);
        $gregorian = Verta::jalaliToGregorian($arr[0], $arr[1], $arr[2]);
        return $gregorian[0] . '-' . $gregorian[1] . '-' . $gregorian[2];
    }
}
