<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OtakudesuAPI extends Controller
{

    public function getHome()
    {
        try {
            $response = Http::get('http://127.0.0.1:3000/home');
            return $response->json();
        } catch (ConnectionException $e) {
            return FALSE;
        }
    }

    public function getCompleteAnime(int $page = 1)
    {
        try {
            $response = Http::get('http://127.0.0.1:3000/complete-anime/page/' . $page);
            return $response->json();
        } catch (ConnectionException $e) {
            return FALSE;
        }
    }

    public function getOngoingAnime(int $page = 1)
    {
        try {
            $response = Http::get('http://127.0.0.1:3000/ongoing-anime/page/' . $page);
            return $response->json();
        } catch (ConnectionException $e) {
            return FALSE;
        }
    }

    public function getSchedule()
    {
        try {
            $response = Http::get('http://127.0.0.1:3000/schedule');
            return $response->json();
        } catch (ConnectionException $e) {
            return FALSE;
        }
    }

    public function getGenreList()
    {
        try {
            $response = Http::get('http://127.0.0.1:3000/genre-list');
            return $response->json();
        } catch (ConnectionException $e) {
            return FALSE;
        }
    }

    public function getGenre(string $id, ?int $page)
    {
        try {
            $response = Http::get('http://127.0.0.1:3000/genre/' . $id . '/' . 'page/' . $page);
            return $response->json();
        } catch (ConnectionException $e) {
            return FALSE;
        }
    }

    public function searchAnime(string $query = "")
    {
        try {
            $response = Http::get('http://127.0.0.1:3000/search/' . $query);
            return $response->json();
        } catch (ConnectionException $e) {
            return FALSE;
        }
    }

    public function getFanpage()
    {
        try {
            $response = Http::get('http://127.0.0.1:3000/fanpage');
            return $response->json();
        } catch (ConnectionException $e) {
            return FALSE;
        }
    }

    public function getDetailAnime(string $id)
    {
        try {
            $response = Http::get('http://127.0.0.1:3000/detail-anime/' . $id);
            return $response->json();
        } catch (ConnectionException $e) {
            return FALSE;
        }
    }

    public function watchAnime(string $id)
    {
        try {
            $response = Http::get('http://127.0.0.1:3000/watch-anime/' . $id);
            return $response->json();
        } catch (ConnectionException $e) {
            return FALSE;
        }
    }
}
