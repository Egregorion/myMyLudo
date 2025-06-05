<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryForm;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(CategoryRepository $cr): Response
    {
        $categories = $cr->findAll();
        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/category/{id}', name: 'app_category_show')]
    public function show($id, CategoryRepository $cr){

        $category = $cr->find($id);
        return $this->render('category/show.html.twig', [
            'category' => $category
        ]);
    }

    #[Route('/category/new', name: 'app_category_new', priority: 2)]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        if($this->isGranted('ROLE_ADMIN')) {
            $category = new Category;
            $form = $this->createForm(CategoryForm::class, $category);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $em->persist($category);
                $em->flush($category);
                return $this->redirectToRoute('app_home');
            }
            return $this->render('category/new.html.twig', [
                'form' => $form
            ]);
        }else{
            return $this->redirectToRoute('app_login');
        }  
    }

    #[Route('/category/{id}/edit', name: 'app_category_edit')]
    public function edit($id, CategoryRepository $cr, Request $request, EntityManagerInterface $em): Response
    {
        $category = $cr->find($id);
        $form = $this->createForm(CategoryForm::class, $category);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($category);
            $em->flush($category);
            return $this->redirectToRoute('app_home');
        }
        return $this->render('category/edit.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/category/{id}/delete', name: 'app_category_delete')]
    public function delete($id, CategoryRepository $cr, EntityManagerInterface $em): Response
    {
        $category = $cr->find($id);
        $em->remove($category);
        $em->flush($category);
        return $this->redirectToRoute('app_home');
    }
}
