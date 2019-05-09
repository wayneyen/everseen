<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tmdb;

class TmdbController extends Controller
{
    public function searchPerson()
    {
        return view('index');
    }

    public function searchPersonResult(Request $request)
    {
        if (empty($request->name)) {
            redirect('/');
            exit();
        }

        $tmdb = new Tmdb;
        $people = $tmdb->searchPerson($request->name);
        $people = json_decode($people);
        $people = $people->results;

        $data = ['people' => json_encode($people, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE)];

        return view('people', $data);
    }
}
