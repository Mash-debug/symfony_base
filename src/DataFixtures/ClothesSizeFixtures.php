<?php

namespace App\DataFixtures;

use App\Entity\ClothesSize;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClothesSizeFixtures extends Fixture
{
    private const CLOTHES_SIZE_REFERENCE = "ClothesSize";

    public function load(ObjectManager $manager): void
    {
        $clothesSizes = [
            "XS",
            "S",
	        "M",
            "L",
            "XL",
            "XXL",
        ];


        foreach($clothesSizes as $key => $size) {
            $clothesSize = new ClothesSize();
            $clothesSize->setSize($size);
            $manager->persist($clothesSize);
            $this->addReference(self::CLOTHES_SIZE_REFERENCE . '_' . $key, $clothesSize);
        }

        $manager->flush();
    }
}
