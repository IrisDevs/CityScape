<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Fixtures7Country extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $faker = Factory::create('fr_FR');
            $country = new Country();
            $country-> setCtName($faker->country());
            $manager->persist($country);
        }

        $manager->flush();
    }
}
