<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilsController;
use Illuminate\Http\Request;

class GenreAnimeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $response = UtilsController::asOtakudesuAPI()->getGenreList();
        if($response === FALSE) {
            return FALSE;
        }
        return view('user.genre', ['genre_list' => $response['genreList']]);
    }
}
