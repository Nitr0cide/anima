<?php


namespace App\Service;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class simklAPI
{

    private $client;
    private $apiKey = "&client_id=1bfa409f13e7b6b11392f56726abafc92b69effa1f2c6b8e9e82351b7963c8f1&extended=full";

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getLatestPremieres() {

        $response = $this->client->request('GET', 'https://api.simkl.com/tv/premieres/new?type=animation_filter'.$this->apiKey);

        return $response;
    }

    public function findAnimeEpisodeByFileName() {
        $response = $this->client->request('POST', 'https://api.simkl.com/search/file', [
            'extra' => [
                'curl' => [
                    CURLOPT_POSTFIELDS => "{
                        'file: Were.The.Fugawis.S01E01E02.WS.DSR.x264-NY2.mkv',
                        'part: 1',
                    }",
                ],
            ],
        ]);

        dd($response->toArray());

        return $response;
    }

    public function getAnimeFullInfo(int $id){
        $response = $this->client->request('GET', 'https://api.simkl.com/anime/'.$id.'?client_id='.$this->apiKey);

        return $response;
    }
}