<?php

namespace App\Console\Commands;

use Str;
use App\Services\Upera\Client;
use Illuminate\Console\Command;

class Genre extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:genre';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find all genres';

    /**
     * Execute the console command.
     */
    public function handle(Client $client): void
    {
        $client->genres('genres')->each(function (array $genre, int $index) {
            $this->info(
                sprintf("Genre command: attempting to insert the %s genre", Str::upper($genre['en']))
            );

            \App\Models\Genre::where('title', $genre['fa'])->updateOrCreate([
                'title' => $genre['fa'],
            ], [
                'title_en' => $genre['en'],
                'position' => $index + 1
            ]);
        });
    }
}
