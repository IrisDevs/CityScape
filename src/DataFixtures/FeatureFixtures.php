<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Feature;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FeatureFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // for ($i = 0; $i < 5; $i++) {
        //     $faker = Factory::create('fr_FR');
        //     $feature = new Feature();
        //     $feature-> setFeatTitle($faker->word());
        //     $feature-> setFeatProperty();
        //     $manager->persist($feature);
        // }

        $manager->flush();
    }
}
