<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

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
    public function handle()
    {
        $url = 'https://web.upera.tv/api/v1/new_genres';

        Http::get($url)
            ->collect('genres')
            ->each(function (array $genre, int $index) {
                $fa = $genre['fa'];
                $en = $genre['en'];
                \App\Models\Genre::where('title', $fa)->updateOrCreate([
                    'title' => $fa,
                ], [
                    'title_en' => $en,
                    'position' => $index + 1
                ]);

            });
    }
}
