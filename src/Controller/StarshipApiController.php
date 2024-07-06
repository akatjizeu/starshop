<?php

namespace App\Controller;

use App\Model\Starship;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipApiController extends AbstractController
{
    #[Route('api/starships', name: 'starships')]
    public function getCollection():Response
    {
        $starships =[
            new Starship(1, 'Uaueza', '4A','Ueii','Beautiful'),
            new Starship(2,'Casa','4B','CASA','Better'),
            new Starship(3,'Dasa','4C','DASA','BNot At all')
        ] ;
        return $this->json($starships);
    }

}