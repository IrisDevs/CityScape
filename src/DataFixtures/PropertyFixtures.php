<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Picture;
use App\Entity\Feature;
use App\Entity\Amenity;
use App\Entity\Rent;
use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PropertyFixtures extends Fixture
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
        $this->setReference('property' , $property);
                // $picture = new Picture();
                // $picture-> setPicProperty($property);
                // $picture-> setPicFile($faker->word());
                // $picture-> setPicName($faker->word());
                // $picture-> setPicHref($faker->mimeType());
                // $picture-> setPicAlt($faker->sentence());
                // $picture-> setPicCaption($faker->sentence());
                // $picture-> setPicType($faker->sentence());
                // $picture-> setPicFormat($faker->fileExtension());
                // $picture-> setPicWidth($faker->numberBetween(0, 1000));
                // $picture-> setPicHeight($faker->numberBetween(0, 1000));
                // $picture-> setPicSize($faker->numberBetween(0, 1000));
                // $this->setReference('picture', $picture);
                // $manager->persist($picture);
                $feature = new Feature();
                $feature-> setFeatTitle($faker->word());
                $feature-> setFeatProperty($property);
                $this->setReference('feature', $feature);
                $manager->persist($feature);
                $amenity = new Amenity();
                $amenity-> setAmenDishwasher($faker->numberBetween(0, 1));
                $amenity-> setAmenFloorCoverings($faker->numberBetween(0, 1));
                $amenity-> setAmenInternet($faker->numberBetween(0, 1));
                $amenity-> setAmenWardrobes($faker->numberBetween(0, 1));
                $amenity-> setAmenSupermarket($faker->numberBetween(0, 1));
                $amenity-> setAmenKidsZone($faker->numberBetween(0, 1));
                $amenity-> setAmenProp($property);
                $this->setReference('amenity', $amenity);
                $manager->persist($amenity);
        $manager->persist($property);
        }
        


        $manager->flush();
    }
}
