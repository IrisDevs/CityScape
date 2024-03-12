<?php

namespace App\Controller\Admin;


use App\Entity\Property;
use App\Form\PictureFormType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\NumericFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\BooleanFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class PropertyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Property::class;
    }

    public function configureActions(Actions $actions) : Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural("Propriétés")
            ->setEntityLabelInSingular("une propriété")
            //->setDateFormat('...')
        ;
    }


    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(ChoiceFilter::new("prop_housing_type", "Type de propriété")->setChoices([
                "Maison" => "House",
                "Appartement" => "Apartment",
                "Bureau" => "Office",
                "Villa" => "villa",
            ]))
            ->add(NumericFilter::new("prop_nb_rooms", "Nombre de chambres"))
            ->add(NumericFilter::new("prop_sqm", "Nombre de mètres carrés"))
            ->add(NumericFilter::new("prop_price", "Prix"))
            ->add(NumericFilter::new("prop_nb_beds", "Nombre de baignoires"))
            ->add(NumericFilter::new("prop_nb_spaces", "Nombre de places de parking"))
            ->add(BooleanFilter::new("prop_furnished", "Meublé ou non ?"))
        ;
    }
    


    public function configureFields(string $property): iterable
    {
        return [
            TextField::new('prop_housing_type'),
            IntegerField::new('prop_nb_rooms'),
            IntegerField::new('prop_sqm'),
            IntegerField::new('prop_price'),
            IntegerField::new('prop_nb_beds'),
            IntegerField::new('prop_nb_baths'),
            IntegerField::new('prop_nb_spaces'),
            BooleanField::new('prop_furnished'),            
            CollectionField::new('Picture')
            ->setTemplatePath('bundles/EasyAdminBundle/page/picture.html.twig')
            ->setEntryIsComplex(true)
            ->useEntryCrudForm(),
        ];
    }
 
}
