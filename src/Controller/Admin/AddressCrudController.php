<?php

namespace App\Controller\Admin;

use App\Entity\Address;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;

class AddressCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Address::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('add_nb_street', 'Numéro de la rue'),
            TextField::new('add_address_line_1', 'Adresse'),
            TextField::new('add_address_line_2', 'Complément D"adresse'),
            TextField::new('add_city', 'Ville'),
            TextField::new('add_state', 'Région/Etat'),
            TextField::new('add_zip', 'Zip/Code postal'),
            CountryField::new('add_country', 'Pays'),
        ];
    }

}
