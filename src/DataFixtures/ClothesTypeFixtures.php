<?php

namespace App\DataFixtures;

use App\Entity\ClothesType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClothesTypeFixtures extends Fixture
{
    private const CLOTHES_TYPE_REFERENCE = "ClothesType";

    public function load(ObjectManager $manager): void
    {
        $clothesTypes = [
            "Pant",
            "Shirt",
            "T-Shirt",
            "Pull"
        ];

        foreach($clothesTypes as $key => $type) {
            $clothesType = new ClothesType();
            $clothesType->setType($type);
            $manager->persist($clothesType);
            $this->addReference(self::CLOTHES_TYPE_REFERENCE . '_' . $key, $clothesType);
        }

        $manager->flush();
    }
}
