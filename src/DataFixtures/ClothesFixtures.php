<?php

namespace App\DataFixtures;

use App\Entity\Clothes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ClothesFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [CategoryFixtures::class, ClothesTypeFixtures::class, ClothesSizeFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        $clothesTab = [
            [
                "category" => "Category_0",
                "brand" => "H&M",
                "type" => "ClothesType_0", 
                "description" => "Jeans en denim de qualité supérieure de chez H&M. Un incontournable de la garde-robe, ces jeans offrent un ajustement parfait et un style intemporel.",
                "color" => "indigo",
                "size" => "ClothesSize_2",
                "price" => 39.99,
                "imageUrl" => "https://www.kramer.fr/\$WS/kraemer-pferdesport/websale8_shop-kraemer-pferdesport/produkte/medien/bilder/gross/B182554.jpg",
            ],
            [
                "category" => "Category_1",
                "brand" => "Adidas",
                "type" => "ClothesType_2", 
                "description" => "T-shirt Adidas Originals au design emblématique. Parfait pour afficher un style urbain décontracté, ce t-shirt allie confort et tendance.",
                "color" => "black",
                "size" => "ClothesSize_3",
                "price" => 29.99,
                "imageUrl" => "https://img01.ztat.net/article/spp-media-p1/23cfba0eaa6549a2876956efdb1dec2f/b4f9492dc5a44b36ac6dfdf83cbf1e92.jpg?imwidth=1800&filter=packshot"
            ],
            [
                "category" => "Category_2",
                "brand" => "Nike",
                "type" => "ClothesType_2", 
                "description" => "Ensemble Nike Sportswear pour un style décontracté et confortable. Le mélange parfait entre mode et fonctionnalité, idéal pour une journée active.",
                "color" => "black",
                "size" => "ClothesSize_1",
                "price" => 49.99,
                "imageUrl" => "https://img01.ztat.net/article/spp-media-p1/943b3e2336b747888329e746fcccf2de/c33298ae50d34ffda271d496d9e3ff6e.jpg?imwidth=1800&filter=packshot"
            ]
        ];

        foreach($clothesTab as $clothe) {
            $clothes = new Clothes();
            $clothes->setCategory($this->getReference($clothe["category"]));
            $clothes->setBrand($clothe["brand"]);
            $clothes->setType($this->getReference($clothe["type"]));
            $clothes->setDescription($clothe["description"]);
            $clothes->setColor($clothe["color"]);
            $clothes->setSize($this->getReference($clothe["size"]));
            $clothes->setPrice($clothe["price"]);
            $clothes->setImageUrl($clothe["imageUrl"]);

            $manager->persist($clothes);
        }

        $manager->flush();
    }
}
