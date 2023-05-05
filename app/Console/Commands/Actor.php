<?php

namespace App\Console\Commands;

use App\Services\Upera\Client;
use Illuminate\Console\Command;

class Actor extends Command
{
    protected $signature = 'crawl:actor';

    protected $description = 'Find all actors';

    public function handle(Client $client): void
    {

//        $result = Http::get('https://web.upera.tv/api/v1/new_casts/1/ir/0')->json('data');

        $client->moviesWithLinks();
    }
}
