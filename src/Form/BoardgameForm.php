<?php

namespace App\Form;

use App\Entity\Boardgame;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Asset;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class BoardgameForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'constraints' => [
                new NotNull(['message' => "patate"]),
                new Length(['max' => 12]),
                ],
            ])
            ->add('release_year')
            ->add('publisher')
            ->add('picture', FileType::class, [
                'mapped' => false,
                'required' => false
            ])
            ->add('player_number')
            ->add('age')
            ->add('average_duration')
            ->add('description')
            // ->add('categories', EntityType::class, [
            //     'class' => Category::class,
            //     'expanded' => true,
            //     'multiple' => true
            // ])
            ->add('envoyer', SubmitType::class)
        ;
    }

    public function getAllCategories(CategoryRepository $cr)
    {
        $categories = $cr->findAll();
        return $categories;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Boardgame::class,
        ]);
    }
}
