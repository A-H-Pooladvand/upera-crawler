<?php

namespace App\Console\Commands;

use File;
use App\Models\Media;
use App\Models\Poster;
use App\Models\Source;
use Illuminate\Support\Str;
use App\Services\Upera\Client;
use Illuminate\Console\Command;

class Movie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:movie';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find all movies';

    /**
     * Execute the console command.
     * @throws \Exception
     */
    public function handle(Client $client): void
    {
        $page = 1;

        do {
            $movies = $client
                ->moviesWithLinks($page)
                ->each(function (array $movie) {
                    $url = 'https://s35.upera.net/thumb?w=675&h=1000&q=90&src=https://s35.upera.net/s3/posters/' . $movie['poster'];
                    $content = file_get_contents($url);
                    $extension = pathinfo($url, PATHINFO_EXTENSION);

                    $path = "/home/amirhossein/Desktop/site/live/191632-main-2.4/Script/webflix_fa/public_html/uploads/$extension/{$movie['poster']}";


                    File::put($path, $content);

                    $media = Media::create([
                        'titre'     => $movie['poster'],
                        'url'       => $movie['poster'],
                        'extension' => $extension,
                        'type'      => File::mimeType($path),
                        'date'      => now(),
                        'enabled'   => 1,
                    ]);

                    $title = trim($movie['name']);
                    $slug = $this->slug($title);
                    $poster = Poster::where('slug', $slug)->first();

                    if (is_null($poster)) {
                        $poster = Poster::create([
                            'cover_id'       => $media->id,
                            'posted_id'      => $media->id,
                            'title'          => $title,
                            'type'           => 'movie',
                            'duration'       => 120,
                            'imdb'           => random_int(4, 8),
                            'rating'         => 3,
                            'shares'         => 0,
                            'playas'         => 1,
                            'downloads'      => 0,
                            'views'          => 0,
                            'created'        => now(),
                            'classification' => 'همه سنین',
                            'year'           => $movie['year'],
                            'description'    => '.',
                            'enabled'        => '1',
                            'comment'        => '1',
                            'slug'           => $slug,
                            //                        'label'          => '.',
                            //                        'sublabel'       => '.',
                        ]);
                    }

                    collect($movie['links'])->each(function ($link) use ($poster) {
                        if ($link['type'] !== 'traffic') {
                            return;
                        }

                        $l = Str::before($link['link'], '?');

                        $extension = pathinfo($l, PATHINFO_EXTENSION);
                        $quality = preg_replace('/\b(?!\d+\b)\w+\b/', '', $link['title']);

                        Source::create([
                            'poster_id' => $poster->id,
                            'type'      => $extension,
                            'url'       => $l,
                            'quality'   => $quality,
                            'title'     => $link['title'],
                            'size'      => $link['size'],
                            'kind'      => 'both',
                            'external'  => 0,
                            'premium'   => 1
                        ]);
                    });


                });
            $page++;
            \Log::info($movies);
        } while ($client->lastPage() >= $page);


    }

    public function slug($title, $separator = '-', $language = 'fa', $dictionary = ['@' => 'at'])
    {
        // Convert all dashes/underscores into separator
        $flip = $separator === '-' ? '_' : '-';

        $title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);

        // Replace dictionary words
        foreach ($dictionary as $key => $value) {
            $dictionary[$key] = $separator . $value . $separator;
        }

        $title = str_replace(array_keys($dictionary), array_values($dictionary), $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace
        $title = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', Str::lower($title));

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);

        return trim($title, $separator);
    }
}
