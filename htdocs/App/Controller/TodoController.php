<?php


namespace App\Controller;

use GuzzleHttp\Client;

class TodoController extends AbstractController
{
    public function home(){
        $client = new Client();
        $res = $client->request('GET', 'https://api.github.com');
        echo $res->getBody();
    }
}