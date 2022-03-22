<?php


namespace App\Services;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MemoService
{
    protected $httpClient;
    protected $url = "";
    protected $base_url_staging ="https://api.staging.quodari.com/api/";
    protected $param= "";

    public function __construct(HttpClientInterface $httpClient, ContainerBagInterface $params)
    {
        $this->httpClient = $httpClient;
        $this->param = $params->get('app.quodari_token');
    }

    public function getClient()
    {
        $client = HttpClient::create(
            [
                'auth_bearer' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2NDc5NTMzMzYsImV4cCI6MTY0Nzk2MDUzNiwicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJtYWlsIjoiZGl2ZXJnZW50ZGV2QHByb3Rvbm1haWwuY29tIn0.k7cDLzF586D2UdVr8CwmHklCTHiI0bAQZjQZpNdPAx8Fkdg9dLzTOujlKV1JYchZPBUwN4DCDcga1aFApjgsOu8VHs7Krdye8Eq_8DOuWz7Yd0Lpc7rPxHC8N7xQaZ7AzgkmcxNC1IlpZVqIu4Vs6Ou5nsMruIxKnC3tH7S1j0LOhv9PujeIvB7lCD8mSjICeD0AAu709K3y0K_dKfqLEMX8rN-Sr4wQ9rWiR7BixbykY6kGo5rFoRQtvUlupwlRhpzZ9uYI-nTWuEMSvFsYOP_AVuWhwR4nqYzOxsfoJZA-iRwvuqv1atzvIZgMslGC74bA_cGWFUy1y3_eMmKkcK2aqVYIsD042DaQ-MxYG5tzs8x35PP0PxhndQ4x0TVBDdBQkFmEcj0CPNJ3hkZSNZwaeTjk70YS3JPS7JvogdjalzP5BArdvLWUEh6JLmoOfOdFd0Vks6zUHh0GJVNdhrRvhQNN-bZF3fOSvU7q1hUY7QotswniXDM7DiTPKWUgyo6iRd3bJja-92F9RhE24owxGOEB_baEHwsEeyxe4ljpigJXOCYdnDFufUiGATSrcvxTU_JeH866LYYFgmzFmkx1FYyTUWRmWHZGeqCr_7cZ4wL5d3uLPxIDknho1aXdluxKdkpHm6i4-gV_MNXrUVffdSuNNFWMo1Wab5kBzG0'
            ]
        );
        return $client;
    }

    public function getJWT()
    {
        $client = HttpClient::create(
            [
                'auth_basic' => ['divergentdev@protonmail.com','ruben22w']
            ]
        );

        return $client;

        dump($client); die();
    }

    public function createCollection()
    {

    }

    public function createMemo()
    {
        $this->url = $this->base_url_staging."memo";

        $response = $this->getClient()->request('POST', "https://api.staging.quodari.com/api/memo", [
            // these values are automatically encoded before including them in the URL
            'query' => [
                'title' => "5 -Just another memo",
                "description" => "a description"
            ],
        ]);

        dump($response->getInfo());


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