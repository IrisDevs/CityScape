<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Rent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Fixtures9Rent extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // for ($i = 0; $i < 5; $i++) {
        //     $faker = Factory::create('fr_FR');
        //     $rent = new Rent();
        //     $rent-> setRentStart(new \DateTime());
        //     $rent-> setRentEnd(new \DateTime());
        //     $rent-> setRentPrice($faker->numberBetween(0, 20000));
        //     $rent-> setRentUser($faker->);
        //     $rent-> setRentProperty($faker->);
        //     $manager->persist($rent);
        // }
        $manager->flush();
    }
}
