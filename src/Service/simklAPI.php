<?php


namespace App\Service;


use App\Repository\AnimeRepository;
use Curl\Curl;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class simklAPI
{
    private $repo;
    private $client;
    private $apiKey = "1bfa409f13e7b6b11392f56726abafc92b69effa1f2c6b8e9e82351b7963c8f1";

    private $animedbs = ["imdb", "anidb", "crunchyroll", "tvdb", "mal", "hulu"];

    public function __construct(HttpClientInterface $client, AnimeRepository $repo)
    {
        $this->client = $client;
        $this->repo = $repo;
    }

    public function searchAnimeByName(){


        $response = $this->client->request('GET', 'https://api.simkl.com/search/anime?q=death%20note&client_id='.$this->apiKey)->toArray();

        return $response;
    }

    public function searchDetailedById() {
        $response = $this->client->request('GET', 'https://api.simkl.com/anime/40190?client_id='.$this->apiKey.'&extended=full')->toArray();

        return $response;
    }
    public function searchById(int $id, string $db = "simkl"){

        $response = $this->client->request('GET', 'https://api.simkl.com/search/id?'.$db.'='.$id.'&client_id='.$this->apiKey.'&extended=full');

        if ($response->getContent() == null) {
            foreach ($this->animedbs as $dbname) {
                $response = $this->client->request('GET', 'https://api.simkl.com/search/id?'.$dbname.'='.$id.'&client_id='.$this->apiKey);
                if ($response->getContent() != null) {
                    return $response->toArray();
                }
            }
        }

        return $response->toArray();
    }

    public function getLatestPremieres() {

        $response = $this->client->request('GET', 'https://api.simkl.com/tv/premieres/new?type=animation_filter'.$this->apiKey);

        return $response;
    }

    public function findAnimeEpisodeByFileName() {
    // POST Method that i can't get to work with curl


        return;
    }

    public function getAnimeFullInfo(int $id){
        $response = $this->client->request('GET', 'https://api.simkl.com/anime/'.$id.'?client_id='.$this->apiKey);

        return $response;
    }
}