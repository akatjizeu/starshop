<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipApiController extends AbstractController
{
    #[Route('api/starships', name: 'starships')]
    public function getCollection():Response
    {
        $starships =[
            [
                'name' => 'Uaueza',
                'class' => '4A',
                'captain' => 'Ueii',
                'status' => 'Beautiful',
            ],
            [
                'name' => 'Casa',
                'class' => '4B',
                'captain' => 'CASA',
                'status' => 'Better',
            ],
            [
                'name' => 'Dasa',
                'class' => '4C',
                'captain' => 'DASA',
                'status' => 'Not At all',
            ]
        ] ;
        return $this->json($starships);
    }

}