<?php

namespace App\Controller\Admin;


use App\Entity\Property;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

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
    


    public function configureFields(string $property): iterable
    {
        return [
            IdField::new('id'),
            IntegerField::new('prop_price'),
            IntegerField::new('prop_nb_rooms'),
            CollectionField::new('picture') 
            ->setTemplatePath('bundles/EasyAdminBundle/page/picture.html.twig')
            ->allowAdd()
            ->allowDelete()
            ->setEntryType(CollectionType::class),
        ];
    }
 
}
