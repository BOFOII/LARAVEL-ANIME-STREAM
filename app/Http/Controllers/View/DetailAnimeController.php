<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DetailAnimeController extends Controller
{
    public function __invoke(Request $request)
    {
        $response_detail = UtilsController::asOtakudesuAPI()->getDetailAnime($request->route('slug'));
        $response_watch = ($response_detail === FALSE)
            ?
            FALSE
            :
            UtilsController::asOtakudesuAPI()->watchAnime(
                ($request->route('slug_eps') !== NULL) ? $request->route('slug_eps') : str_replace('episode/', '', end($response_detail['episode_list'])['id'])
            );
        if ($response_watch === FALSE) {
            return FALSE;
        }
        $detail_data = [
            'detai_anime' => $response_detail,
            'watch_anime' => $response_watch,
        ];
        return view('user.detail-anime', $detail_data);
    }
}
