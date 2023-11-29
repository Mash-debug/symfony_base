<?php

namespace App\DataFixtures;

use App\Entity\ShoesType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ShoesTypeFixtures extends Fixture
{
    private const SHOES_TYPE_REFERENCE = 'ShoesType';

    public function load(ObjectManager $manager): void
    {
        $shoesTypes = [
            "Sneakers",
            "Boots",
            "Sandals",
            "Flip Flop"
        ];

        foreach($shoesTypes as $key => $type) {
            $shoesType = new ShoesType();
            $shoesType->setType($type);
            $manager->persist($shoesType);
            $this->addReference(self::SHOES_TYPE_REFERENCE . '_' . $key, $shoesType);
        }

        $manager->flush();
    }
}
