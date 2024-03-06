<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Fixtures10Category extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // $c  = [
        //     1=> [
        //         "title"=> "page",
        //         "slug"=> "",
        //         "description" => "",
        //         'parent' => [
        //             1 => [
        //                 "Property"=> "property",
        //                 "Property_Side"=> "propertySide",
        //                 "Property_Detail"=> "propertyDetail",
        //                 "Add_New_Listing"=> "addNewListing",
        //                 "About_Us"=> "aboutUs",
        //                 "Faq"=> "faq",
        //                 "Check_Out"=> "checkOut",
        //                 "Cart" => "cart"  
        //                 ]
        //             ]
        //         ],
        
        //     2=> [
        //         "title" => "project",
        //         "slug"=> "",
        //         "description" => "", 
        //         'parent' => [
        //             1 => [
        //                 "Project_Side"=> "projectSide",
        //                 "Project_Detail"=> "projetctDetail"                    
        //                 ]
        //             ]               
        //         ],
        //     3=> [
        //         "title"=> "blog",
        //         "slug"=> "",
        //         "description"=> "",
        //         'parent' => [
        //             1 => [
        //                 "Blog_Side"=>"blogSide",
        //                 "Blog_Detail"=> "blogDetail"                   
        //                 ]
        //             ]
        //         ],
        //     4=> [
        //         "title"=> "contact",
        //         "slug"=> "",
        //         "description"=> ""
        //         ],
        //     ];


        // foreach ($c['parent'] as $data){
        //     $category = new Category();
        //     $category-> setName($data['parent']);
        //     $category-> setSlug($data['parent']);
        //     $category-> setMetaTitle($data['parent']);
        //     $category-> setMetaDescription('test');
        //     $manager->persist($category);
        
        // }

        $manager->flush();
    }
}

