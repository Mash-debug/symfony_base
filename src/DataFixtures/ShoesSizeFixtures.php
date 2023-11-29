<?php

namespace App\DataFixtures;

use App\Entity\ShoesSize;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ShoesSizeFixtures extends Fixture
{
    private const SHOES_SIZE_REFERENCE = "ShoesSize";

    public function load(ObjectManager $manager): void
    {
        $shoesSizes = [
            38,
            39,
            40,
            41,
            42,
	        43,
            44,
            45,
            46,
            47,
            48
        ];

        foreach($shoesSizes as $key => $size) {
            $shoesSize = new ShoesSize();
            $shoesSize->setSize($size);
            $manager->persist($shoesSize);
            $this->addReference(self::SHOES_SIZE_REFERENCE . '_' . $key, $shoesSize);
        }

        $manager->flush();
    }
}
