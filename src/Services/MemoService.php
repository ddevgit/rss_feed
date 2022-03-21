<?php


namespace App\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class MemoService
{
    protected $httpClient;
    protected $url = "";
    protected $base_url_staging ="https://api.staging.quodari.com/api/";

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getJWT()
    {
        $this->url = $this->base_url_staging."login";

        $response = $this->httpClient->request('POST', 'https://...', [
            'json' => ['param1' => 'value1', '...'],
        ]);

        $decodedPayload = $response->toArray();
    }

    public function createCollection()
    {

    }

    public function createMemo()
    {
        $this->url = $this->base_url_staging."memo";

        $response = $this->httpClient->request('POST', $this->url, [
            'json' => [
                'title' => 'hey',
                'description' => 'description',
                ],
        ]);

        var_dump($response); die();
        return $response;
    }

    public function __toString()
    {
       return "MemoService";
    }


    public function uploadMemoPhoto()
    {

    }

    public function updateMemo()
    {

    }

}