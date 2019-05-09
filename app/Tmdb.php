<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use Session;

class Tmdb extends Model
{
    public $key = 'cfde2be35609e3a3b0befad446bd4ddf';
    public $token = null;

    private $tokenURL = 'https://api.themoviedb.org/3/authentication/token/new?api_key=';
    private $searchPersonURL = 'https://api.themoviedb.org/3/search/person';

    public function __construct()
    {
        if (!Session::get('tmdb_token')) {
            $this->requestToken();
        } else {
            $this->token = Session::get('tmdb_token');
        }

        $this->searchPersonURL .= '?api_key=' . $this->key;
    }

    public function requestToken()
    {
        $result = file_get_contents($this->tokenURL . $this->key);
        $result = json_decode($result);

        if ($result->success) {
            $this->token = $result->request_token;
            Session::put('tmdb_token', $result->request_token);
        }
    }

    public function searchPerson($query, $page = 1)
    {
        $url = $this->searchPersonURL . "&query=$query&page=$page";

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);

        return $response->getBody();
    }
}
