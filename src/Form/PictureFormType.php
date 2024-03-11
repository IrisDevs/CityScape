<?php

namespace App\Form;

use App\Entity\Picture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;



class PictureFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       $builder
       ->add('Picture', EntityType::class, [
        'label'=> 'Image',
        'class'=> Picture::class,
        'choice_label' => 'image_name'
       ])
        ->add('value', TextType::class, [
            'label'=> 'Valeur',
            'empty_data'=> '',
        ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class', 'Picture']);
    }
}