<?php

namespace App\Controller;

use App\Entity\Boardgame;
use App\Form\BoardgameForm;
use App\Repository\BoardgameRepository;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Attribute\Route;

final class BoardgameController extends AbstractController
{
    #[Route('/boardgame', name: 'app_boardgame')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_boardgame_show', ['id'=>'1']);
    }

    #[Route('/boardgame/{id}', name: 'app_boardgame_show')]
    public function show($id, BoardgameRepository $boardgameRepository): Response
    {
        $boardgame = $boardgameRepository->find($id);
        //dump($boardgame);
        return $this->render('boardgame/show.html.twig', [
            'boardgame' => $boardgame
        ]);
    }

    #[Route('/boardgame/new', name: 'app_boardgame_new', priority: 2)]
    public function new(FileUploader $fileUploader, Request $request, EntityManagerInterface $em) : Response
    {
        $boardgame = new Boardgame;
        $form = $this->createForm(BoardgameForm::class, $boardgame);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            /** @var UploadedFile $pictureFile */
            $pictureFile = $form->get('picture')->getData();
            if ($pictureFile) {
                $pictureFileName = $fileUploader->upload($pictureFile);
                $boardgame->setPicture($pictureFileName);
            }else{
                $boardgame->setPicture('default.png');
            }
            $em->persist($boardgame);
            $em->flush($boardgame);
            return $this->redirectToRoute('app_home');
        }

        return $this->render('boardgame/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/boardgame/{id}/edit', name: 'app_boardgame_edit')]
    public function edit($id, FileUploader $fileUploader, Request $request, EntityManagerInterface $em, BoardgameRepository $bgr) : Response
    {
        $boardgame = $bgr->find($id);
        $form = $this->createForm(BoardgameForm::class, $boardgame);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            /** @var UploadedFile $pictureFile */
            $pictureFile = $form->get('picture')->getData();
            if ($pictureFile) {
                $pictureFileName = $fileUploader->upload($pictureFile);
                $boardgame->setPicture($pictureFileName);
            }
            $em->persist($boardgame);
            $em->flush($boardgame);
            return $this->redirectToRoute('app_home');
        }

        return $this->render('boardgame/edit.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/boardgame/{id}/delete', name: 'app_boardgame_delete')]
    public function delete($id, EntityManagerInterface $em, BoardgameRepository $bgr, KernelInterface $ki) : Response
    {
        $uploadDir = $ki->getProjectDir().'/public/uploads/'; 
        $boardgame = $bgr->find($id);
        $img = $boardgame->getPicture();
        if($img != 'default.png'){
            unlink($uploadDir.$img);
        }
        $em->remove($boardgame);
        $em->flush($boardgame);
        return $this->redirectToRoute('app_home');
    }

    #[Route('/boardgame/{id}/addtocollection', name: 'app_boardgame_addToCollection')]
    public function addToCollection($id, BoardgameRepository $br, EntityManagerInterface $em, Request $request)
    {
        /** @var App\Entity\User $user */
        $user = $this->getUser();
        $boardgame = $br->find($id);
        $user->addBoardgame($boardgame);
        $em->persist($user);
        $em->flush();
        
        // Si c'est une requête AJAX, retourner une réponse JSON
        if ($request->isXmlHttpRequest()) {
            return $this->json(['success' => true, 'message' => 'Jeu ajouté à votre collection']);
        }
        
        return $this->redirectToRoute('app_boardgame_show', ['id' => $id]);
    } 

    #[Route('/boardgame/{id}/removefromcollection', name: 'app_boardgame_removeFromCollection')]
    public function removeFromCollection($id, BoardgameRepository $br, EntityManagerInterface $em, Request $request)
    {
        /** @var App\Entity\User $user */
        $user = $this->getUser();
        $boardgame = $br->find($id);
        $user->removeBoardgame($boardgame);
        $em->persist($user);
        $em->flush();
        
        // Si c'est une requête AJAX, retourner une réponse JSON
        if ($request->isXmlHttpRequest()) {
            return $this->json(['success' => true, 'message' => 'Jeu retiré de votre collection']);
        }
        
        return $this->redirectToRoute('app_boardgame_show', ['id' => $id]);
    } 
}
