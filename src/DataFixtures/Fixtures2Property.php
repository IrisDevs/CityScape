<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Fixtures2Property extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
        $faker = Factory::create('fr_FR');
        $property = new Property();
        $property-> setPropHousingType($faker->randomElement(['maison', 'appartement', 'studio', 'pavillon', 'bureau', 'villa', 'maison de luxe']));
        $property-> setPropNbRooms($faker->randomDigit());
        $property-> setPropSqm($faker->numberBetween(0, 1000));
        $property-> setPropPrice($faker->numberBetween(0, 20000));
        $property-> setCreatedAt(new \DateTimeImmutable());
        $property-> setPropNbBeds($faker->randomDigit());
        $property-> setPropNbBaths($faker->randomDigit());
        $property-> setPropNbSpaces($faker->randomDigit());
        $property-> setPropFurnished($faker->numberBetween(0, 1));
        $manager->persist($property);
        }
        


        $manager->flush();
    }
}
