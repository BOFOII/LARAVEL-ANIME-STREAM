<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilsController;
use Illuminate\Http\Request;

class SchedulerController extends Controller
{
    public function __invoke()
    {
        $response = UtilsController::asOtakudesuAPI()->getSchedule();
        if($response === FALSE) {
            return FALSE;
        }
        return view('user.jadwal-anime', [
            'schedule_list' => $response['scheduleList']
        ]);
    }
}
