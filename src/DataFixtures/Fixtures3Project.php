<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Fixtures3Project extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $faker = Factory::create('fr_FR');
            $project = new Project();
            $project-> setProjClient($faker->lastName());
            $project-> setProjPrice($faker->numberBetween(0, 100000));
            $project-> setProjCategory($faker->word());
            $project-> setProjDate(new \DateTime());
            $project-> setProjFacebook($faker->domainName());
            $project-> setProjTwitter($faker->domainName());
            $project-> setProjLinkedin($faker->domainName());
            $project-> setProjInstagram($faker->domainName());
            $project-> setProjTitle($faker->sentence());
            $manager->persist($project);
        }

        $manager->flush();
    }
}
