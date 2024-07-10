<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MainController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    #[Route('/', name: 'app_homepage')]
    public function homepage(
        StarshipRepository $starshipRepository,
        HttpClientInterface $client,
        CacheInterface $cache,
    ): Response
    {

        $ships = $starshipRepository->findAll();
        $myShip = $ships[array_rand($ships)];

        $issData = $cache->get('iss_location_data',function(ItemInterface $item) use($client):array{
            $item->expiresAfter(5);
            $response = $client ->request('GET', 'https://api.wheretheiss.at/v1/satellites/25544');
            return $issData = $response ->toArray();
        });



        return $this->render('main/homepage.html.twig',[
            'myShip' => $myShip,
            'ships' => $ships,
            'issData' => $issData]);

    }
}
