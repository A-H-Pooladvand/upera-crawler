<?php

namespace App\Http\Controllers;

use Str;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __invoke(Request $request)
    {
        $path = $request->getRequestUri();

        $path = Str::after($path, "/api");


        $client = new Client();
        $response = $client->get('https://traffic.upera.tv' . $path, [
            'headers' => [
                'User-Agent' => $request->header('User-Agent'),
            ],
            'stream'  => true,
        ]);

        return response($response->getBody())
            ->header('Content-Type', $response->getHeaderLine('Content-Type'));
    }
}
