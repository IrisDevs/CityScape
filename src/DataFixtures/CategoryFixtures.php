<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // $category = [
        //     "page"=> [
        //         "Property"=> "property",
        //         "Property_Side"=> "propertySide",
        //         "Property_Detail"=> "propertyDetail",
        //         "Add_New_Listing"=> "addNewListing",
        //         "About_Us"=> "aboutUs",
        //         "Faq"=> "faq",
        //         "Check_Out"=> "checkOut",
        //         "Cart" => "cart"
        //     ],
        //     "project"=> [
        //         "Project_Side"=> "projectSide",
        //         "Project_Detail"=> "projetctDetail"
        //     ],
        //     "blog"=> [
        //         "Blog_Side"=>"blogSide",
        //         "Blog_Detail"=> "blogDetail"
        //     ],
        //     "contact" => ""
        // ];

        $manager->flush();
    }
}


$c  = [
    1=> [
        "title"=> "page",
        "slug"=> "",
        "description" => "",
        'parent' => [
            1 => [
                "Property"=> "property",
                "Property_Side"=> "propertySide",
                "Property_Detail"=> "propertyDetail",
                "Add_New_Listing"=> "addNewListing",
                "About_Us"=> "aboutUs",
                "Faq"=> "faq",
                "Check_Out"=> "checkOut",
                "Cart" => "cart"  
                ]
            ]
        ],

    2=> [
        "title" => "project",
        "slug"=> "",
        "description" => "", 
        'parent' => [
            1 => [
                "Project_Side"=> "projectSide",
                "Project_Detail"=> "projetctDetail"                    
                ]
            ]               
        ],
    3=> [
        "title"=> "blog",
        "slug"=> "",
        "description"=> "",
        'parent' => [
            1 => [
                "Blog_Side"=>"blogSide",
                "Blog_Detail"=> "blogDetail"                   
                ]
            ]
        ],
    4=> [
        "title"=> "contact",
        "slug"=> "",
        "description"=> ""
        ],
    ];