<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Fixtures8Address extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // for ($i = 0; $i < 5; $i++) {
        //     $faker = Factory::create('fr_FR');
        //     $address = new Country();
        //     $address-> setAddNbStreet($faker->numberBetween(0, 100));
        //     $address-> setAddressLine1($faker->streetAddress());
        //     $address-> setAddressLine2($faker->streetSuffix());
        //     $address-> setAddCity($faker->city());
        //     $address-> setAddState($faker->state());
        //     $address-> setAddZip($faker->postcode());
        //     $address-> setAddProperty($faker->);
        //     $address-> setAddCountry($faker->);
        //     $manager->persist($address);
        // }
        $manager->flush();
    }
}
