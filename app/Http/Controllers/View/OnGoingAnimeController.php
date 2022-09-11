<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilsController;
use Illuminate\Http\Request;

class OnGoingAnimeController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'page' => ['int'],
        ]);
        $response = UtilsController::asOtakudesuAPI()->getOngoingAnime($request->has('page') ? $request->page : 1);
        if ($response === FALSE) {
            return FALSE;
        }
        $pagination = $response['paginates'];
        $newpagination = [];
        foreach ($pagination as $pgnt) {
            $newpagination[] = str_replace('/', '', str_replace('https:/otakudesu.watch/ongoing-anime/page/', '', $pgnt));
        }
        sort($newpagination);
        return view('user.ongoing-anime', [
            'anime_list' => $response['animeList'],
            'page' => $response['page'],
            'paginates' => $newpagination,
        ]);
    }
}
