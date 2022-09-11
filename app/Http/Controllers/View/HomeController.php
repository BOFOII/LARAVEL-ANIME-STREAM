<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilsController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $search_callback = function() use($request) {
            $request->validate([
                'search' => ['required'],
            ]);
            return UtilsController::asOtakudesuAPI()->searchAnime($request->search);
        };
        $response = ($request->has('search') === TRUE) ? $search_callback() : UtilsController::asOtakudesuAPI()
                                                                                                ->getHome();
        $home_data = ($request->has('search') === TRUE) ?
            [
                'search_results' => $response['search_results']
            ]
            :
            [
                'on_going_anime' => $response['home']['on_going_anime'],
                'complete_anime' => $response['home']['complete_anime'],
            ];
        if($response === FALSE) {
            return FALSE;
        }
        return ($request->has('search') === TRUE) ?
            view('user.search', $home_data) : view('user.home', $home_data);
    }
}
