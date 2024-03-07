<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
            for ($i = 0; $i < 5; $i++) {
            $faker = Factory::create('fr_FR');
            $user = new User();
            $user-> setEmail($faker->email());
            $user-> setPassword($faker->password());
            $user-> setLastName($faker->lastName());
            $user-> setUserName($faker->userName());
            $user-> setFirstName($faker->firstName());
            // $user-> setUserRoles($faker->randomElements(['admin', 'client']));
            $user-> setIsVerified($faker->numberBetween(0, 1));
            $manager->persist($user);
            }
        
        $manager->flush();
    }
}
