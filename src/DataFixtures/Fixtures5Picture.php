<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Picture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Fixtures5Picture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // for ($i = 0; $i < 5; $i++) {
        //     $faker = Factory::create('fr_FR');
        //     $picture = new Picture();
        //     $picture-> setPicFile($faker->word());
        //     $picture-> setPicName($faker->word());
        //     $picture-> setPicHref($faker->mimeType());
        //     $picture-> setPicAlt($faker->sentence());
        //     $picture-> setPicCaption($faker->sentence());
        //     $picture-> setPicType($faker->sentence());
        //     $picture-> setPicFormat($faker->fileExtension());
        //     $picture-> setPicWidth($faker->numberBetween(0, 1000));
        //     $picture-> setPicHeight($faker->numberBetween(0, 1000));
        //     $picture-> setPicSize($faker->numberBetween(0, 1000));
        //     $manager->persist($picture);
        // }

        $manager->flush();
    }
}
