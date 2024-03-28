<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher
    ){}
    public function load(ObjectManager $manager): void
    {
            for ($i = 0; $i < 5; $i++) {
            $faker = Factory::create('fr_FR');
            $user = new User();
            $user-> setEmail($faker->email());
            $user->setPassword($this->userPasswordHasher->hashPassword($user, 'admin'));
            $user-> setLastName($faker->lastName());
            $user-> setUserName($faker->userName());
            $user-> setFirstName($faker->firstName());
            $user-> setRoles($faker->randomElements(['ROLE_ADMIN', 'ROLE_USER']));
            $user-> setIsVerified($faker->numberBetween(0, 1));
            $manager->persist($user);
            }
        
        $manager->flush();
    }
}
