<?php

namespace App\Helpers;

use App\Models\HerbalMedicine;

if (!function_exists('getHerbalIdByName')) {
    function getHerbalIdByName($name)
    {
        return HerbalMedicine::where('name', '=', $name)->value('id') ?? null;
    }
}