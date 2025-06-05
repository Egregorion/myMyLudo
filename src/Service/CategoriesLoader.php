<?php 

namespace App\Service;

use App\Repository\CategoryRepository;

class CategoriesLoader 
{
    private $repo; 

    public function __construct(CategoryRepository $cr)
    {
        $this->repo = $cr;
    }

    public function getAllCategories()
    {
        $categories = $this->repo->findAll();
        return $categories;
    }
}