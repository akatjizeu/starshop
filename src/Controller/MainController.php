<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function homepage(): Response
    {
        $starshipCount = 457;

        $myShip = [
            'name' => 'Uaueza',
            'class' => '4A',
            'captain' => 'Ueii',
            'status' => 'Beautiful',
        ];

        return $this->render('main/homepage.html.twig',[
            'numberOfStarships' => $starshipCount,
            'myShip' => $myShip,]);
    }
}
