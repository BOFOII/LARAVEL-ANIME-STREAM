<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilsController;
use Illuminate\Http\Request;

class AnimeByGenreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(string $genre, Request $request)
    {
        $response = UtilsController::asOtakudesuAPI()->getGenre($genre, $request->has('page') ? $request->page : 1);
        if($response === FALSE) {
            return FALSE;
        }
        $pagination = $response['paginates'];
        $newpagination = [];
        foreach($pagination as $pgnt) {
            $newpagination[] = str_replace('/', '', str_replace("https:/otakudesu.watch/genres/{$genre}/page/", '', $pgnt));
        }
        sort($newpagination);
        return view('user.anime-by-genre', [
            'anime_list' => $response['animeList'],
            'page' => $response['page'],
            'paginates' => $newpagination,
        ]);
    }
}
