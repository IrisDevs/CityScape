<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Amenity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Fixtures4Amenity extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // for ($i = 0; $i < 5; $i++) {
        //     $faker = Factory::create('fr_FR');
        //     $amenity = new Amenity();
        //     $amenity-> setAmenDishwasher($faker->numberBetween(0, 1));
        //     $amenity-> setAmenFloorCoverings($faker->numberBetween(0, 1));
        //     $amenity-> setAmenInternet($faker->numberBetween(0, 1));
        //     $amenity-> setAmenWardrobes($faker->numberBetween(0, 1));
        //     $amenity-> setAmenSupermarket($faker->numberBetween(0, 1));
        //     $amenity-> setAmenKidsZone($faker->numberBetween(0, 1));
        //     $amenity-> setAmenProperty($property);
        //     $manager->persist($amenity);
        // }

        $manager->flush();
    }
}
