<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\OtakudesuAPI;
use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public static function asOtakudesuAPI() {
        return new OtakudesuAPI();
    }
}
