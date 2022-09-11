<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilsController;
use Illuminate\Http\Request;

class CompleteAnimeController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'page' => ['int'],
        ]);
        $response = UtilsController::asOtakudesuAPI()->getCompleteAnime($request->page == null ? 1 : $request->page);
        if($response === FALSE) {
            return FALSE;
        }
        $pagination = $response['paginates'];
        sort($pagination);
        return view('user.complete-anime', [
            'anime_list' => $response['animeList'],
            'page' => $response['page'],
            'paginates' => $pagination,
        ]);
    }
}
