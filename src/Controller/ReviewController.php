<?php

namespace App\Controller;

use App\Entity\Reviews;
use App\Form\ReviewForm;
use App\Repository\BoardgameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ReviewController extends AbstractController
{
    #[Route('/review', name: 'app_review')]
    public function index(): Response
    {
        return $this->render('review/index.html.twig', [
            'controller_name' => 'ReviewController',
        ]);
    }

    #[Route('/review/{id}/new', name: 'app_review_new')]
    public function new($id, Request $request, BoardgameRepository $br, EntityManagerInterface $em):Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $game = $br->find($id);
        
        $review = new Reviews;
        
        // Pré-remplir l'entité AVANT de créer le formulaire
        $review->setUser($this->getUser());
        $review->setBoardgame($game);
        
        $form = $this->createForm(ReviewForm::class, $review);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($review);
            $em->flush();
            return $this->redirectToRoute('app_boardgame_show', [ 'id' => $id]);
        }
        
        return $this->render('review/new.html.twig', [
            'game' => $game,
            'form' => $form
        ]);
    }
}
