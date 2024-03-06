<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Fixtures1User extends Fixture
{
    public function load(ObjectManager $manager): void
    {
            for ($i = 0; $i < 5; $i++) {
            $faker = Factory::create('fr_FR');
            $user = new User();
            $user-> setEmail($faker->email());
            $user-> setPassword($faker->password());
            // $user-> setUserRoles($faker->randomElement(['admin', 'client']));
            $user-> setIsVerified($faker->numberBetween(0, 1));
            $this->addReference('user' , $user);
                $picture = new Picture();
                $picture-> setPicProperty($faker->numberBetween(0, 5));
                $picture-> setPicFile($faker->word());
                $picture-> setPicName($faker->word());
                $picture-> setPicHref($faker->mimeType());
                $picture-> setPicAlt($faker->sentence());
                $picture-> setPicCaption($faker->sentence());
                $picture-> setPicType($faker->sentence());
                $picture-> setPicFormat($faker->fileExtension());
                $picture-> setPicWidth($faker->numberBetween(0, 1000));
                $picture-> setPicHeight($faker->numberBetween(0, 1000));
                $picture-> setPicSize($faker->numberBetween(0, 1000));
                $manager->persist($picture);
            $manager->persist($user);
            }
        
        $manager->flush();
    }
}
