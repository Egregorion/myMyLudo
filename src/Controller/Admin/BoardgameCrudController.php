<?php

namespace App\Controller\Admin;

use App\Entity\Boardgame;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class BoardgameCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Boardgame::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            IntegerField::new('release_year'),
            TextField::new('publisher'),
            ImageField::new('picture')
                ->setBasePath('/uploads')
                ->setUploadDir('public/uploads')
                ->setRequired(false)
            ,
            TextField::new('player_number'),
            TextField::new('age'),
            IntegerField::new('average_duration'),
            TextEditorField::new('description'),
            AssociationField::new('categories')  
        ];
    }
    
}
