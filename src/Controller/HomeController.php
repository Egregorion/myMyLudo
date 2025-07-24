<?php

namespace App\Controller;

use App\Repository\BoardgameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, BoardgameRepository $boardgame_repository): Response
    {
        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $boardgame_repository->getBoardgamePaginator($offset);
        
        return $this->render('home/index.html.twig', [
            'boardgames' => $paginator,
            'previous' => $offset - BoardgameRepository::BOARDGAMES_PER_PAGE, 
            'next' => min(count($paginator), $offset + BoardgameRepository::BOARDGAMES_PER_PAGE),
        ]);
    }
}
