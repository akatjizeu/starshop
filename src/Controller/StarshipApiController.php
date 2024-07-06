<?php

namespace App\Controller;

use App\Model\Starship;
use App\Repository\StarshipRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route( name: 'starships', methods: ['GET'])]
    public function getCollection( StarshipRepository $repository):Response
    {

        $starships = $repository->findAll();
        return $this->json($starships);
    }


    #[Route('/{id<\d+>}', name: 'starshipsNum',methods: ['GET'])]
    public function get(int $id, StarshipRepository $repository):Response
    {
        $starship = $repository->find($id);

        if(!$starship)
        {
            throw $this->createNotFoundException('The starship does not exist');
        }
        return $this->json($starship);
    }

}