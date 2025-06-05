<?php

namespace App\Controller;

use App\Repository\BoardgameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(BoardgameRepository $boardgame_repository): Response
    {
        $boardgames = $boardgame_repository->findAll();
        return $this->render('home/index.html.twig', [
            'boardgames' => $boardgames, 
        ]);
    }
}
