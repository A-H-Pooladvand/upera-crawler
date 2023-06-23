<?php

namespace App\Services\Upera;

use Http;
use Cache;
use Closure;
use Illuminate\Support\Collection;
use Illuminate\Http\Client\Response;
use GuzzleHttp\Promise\PromiseInterface;

class Client
{
    const LINKS = [
        'movies'   => 'https://panel-api.upera.tv/api/v1/owner/get/movies',
        'series'   => 'https://panel-api.upera.tv/api/v1/owner/get/series',
        'packages' => 'https://panel-api.upera.tv/api/v1/owner/get/series',
        'links'    => 'https://panel-api.upera.tv/api/v1/owner/show_links/',
        'genres'   => 'https://web.upera.tv/api/v1/new_genres',
    ];

    private string $token;

    private int $lastPage;

    public function __construct()
    {
        $this->token = config('movie.token');
    }

    public function movies(int $page = 1): Response|PromiseInterface
    {
        $result = Http::withToken($this->token)
        ->withHeaders($this->headers())
        ->post(self::LINKS['movies'], [
            'ir'             => -1,
            'payment_method' => 0,
            'sale_method'    => -1,
            'page'           => $page,
            'nodata'         => 1,
        ]);

        $this->lastPage = $result->json('data.movies.last_page');

        return $result;
    }

    public function links(string $uri): PromiseInterface|Response
    {
        return Http::withToken($this->token)
            ->withHeaders($this->headers())
            ->get(self::LINKS['links'] . $uri);
    }

    public function moviesWithLinks(int $page = 1): Collection
    {
        return $this->movies($page)
            ->collect('data.movies.data')
            ->map(function ($movie) {
                $movie['links'] = $this->links('movie/' . $movie['id'])->json('data.links');

                return $movie;
            });
    }

    public function headers(): array
    {
        return [
            'User-Agent'      => 'Mozilla/5.0 (X11; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/112.0',
            'Accept'          => 'application/json',
            'Accept-Language' => 'en-US,en;q=0.5',
            'Accept-Encoding' => 'gzip, deflate, br',
            'Origin'          => 'https://panel.upera.tv',
            'Connection'      => 'keep-alive',
            'Referer'         => 'https://panel.upera.tv/',
            'Sec-Fetch-Dest'  => 'empty',
            'Sec-Fetch-Mode'  => 'cors',
            'Sec-Fetch-Site'  => 'same-site',
        ];
    }

    public function lastPage(): int
    {
        return $this->lastPage;
    }

    public function genres(string $key = null): Collection
    {
        return Http::get(self::LINKS['genres'])->collect($key);
    }

    public function allMoviesWithLinks(Closure $callback): void
    {
        $page = 1;

        do {
            $this
                ->moviesWithLinks($page)
                ->each($callback);
            $page++;
        } while ($this->lastPage() >= $page);
    }
}
