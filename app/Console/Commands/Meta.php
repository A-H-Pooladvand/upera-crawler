<?php

namespace App\Console\Commands;

use Http;
use App\Models\Poster;
use Illuminate\Support\Str;
use App\Models\PosterGenre;
use Illuminate\Console\Command;

class Meta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:meta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find all meta data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        PosterGenre::truncate();
        $genres = \App\Models\Genre::get();

        Poster::select(['id', 'movie_id'])->eachById(function (Poster $movie) use ($genres) {
            $result = Http::get("https://web.upera.tv/api/v1/ghost/get/movie/$movie->movie_id")
                ->collect('data');

            if (empty($result['movie'])) {
                $movie->update(['enabled' => false]);
                error_log($movie->movie_id);
                return;
            }

            $m = $result['movie'];

            $movie->update([
                'description'    => $m['overview_fa'],
                'duration'       => $m['runtime'],
                'rating'         => filled($m['rate']) ? ((int)$m['rate'] * 5) / 10 : 3,
                'classification' => $m['age'],
                'imdb'           => filled($m['rate']) ? $m['rate'] : 3
            ]);

            str($m['genre'])->explode(',')->each(function ($en) use ($genres, $movie) {
                $movieGenre = $genres->where('title_en', Str::lower($en))->first();

                if (empty($movieGenre)) {
                    return;
                }

                PosterGenre::create([
                    'poster_id' => $movie->id,
                    'genre_id'  => $movieGenre->id,
                ]);
            });
        }, 500);
    }
}
