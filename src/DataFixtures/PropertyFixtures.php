<?php

namespace App\DataFixtures;

use App\Entity\Picture;
use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;

// Pour utiliser faker
use Faker\Factory;



class PropertyFixtures extends Fixture
{
   
    public function load(ObjectManager $manager): void
    {  
        $faker = Factory::create('fr_FR');

        for ($ii = 1; $ii < 10; $ii++) {

        $property = new Property();
        $property->setPropHousingType($faker->randomElement(['House','Apartment','Office','Villa']));
        $property->setPropNbRooms($faker->numberBetween(0,30));
        $property->setPropSqm($faker->numberBetween(0,1000));
        $property->setPropPrice($faker->numberBetween(0,100000));
        $property->setPropNbBeds($faker->numberBetween(0,10));
        $property->setPropNbBaths($faker->numberBetween(0,10));
        $property->setPropNbSpaces($faker->numberBetween(0,10));
        $property->setPropFurnished($faker->numberBetween(0,1));
        $property->setSlug($faker->slug());
        $property->setTitle($faker->sentence(1));
        $property->setPropFeature($faker->randomElements(['Test','Coucou']));
        $property->setLatitude($faker->latitude());
        $property->setLongitude($faker->longitude());
        $property->setPropCategory($this->getReference('category_' . rand(1,2)));
        // $property->setAddress($faker->address());
        $manager->persist($property);
        

        for ($i = 0; $i <1; $i++) {
            $url = 'https://loremflickr.com/905/584/house';
                $imagename = rand(1, 1000) . '.jpg';
                $img = 'C:\Users\edasi\Documents\GitHub\CityScape\public\img/' . $imagename;
                file_put_contents($img, file_get_contents($url));

                $pict = new Picture();
                $pict->setAttachment($imagename);
                $pict->setPicProperty($property);

                $manager->persist($pict);
        };
     
        
    }
    
    $manager->flush();
}
}