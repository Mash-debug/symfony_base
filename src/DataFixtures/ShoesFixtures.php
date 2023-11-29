<?php

namespace App\DataFixtures;

use App\Entity\Shoes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ShoesFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [CategoryFixtures::class, ShoesTypeFixtures::class, ShoesSizeFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        $shoesTab = [
            [
                "category" => "Category_0",
                "brand" => "Nike",
                "model" => "Jordan", 
                "type" => "ShoesType_0", 
                "description" => "Les Nike Air Jordan, icônes de la street culture, fusionnent style et performance. Arborant l'emblématique logo du Jumpman, elles incarnent l'esprit de la victoire. Légères, dynamiques, et inégalées, ces sneakers transcendent les terrains pour s'imposer avec élégance dans la rue",
                "color" => "red",
                "size" => "ShoesSize_4",
                "price" => 19.99,
                "imageUrl" => "https://cdn.laredoute.com/products/a/6/1/a616b0b1c6e8fc87096dc4ab74f23082.jpg"
            ],
            [
                "category" => "Category_1",
                "brand" => "Adidas",
                "model" => "Superstar", 
                "type" => "ShoesType_0", 
                "description" => "Les Adidas Superstar, des classiques intemporels au design emblématique. Conçues pour le quotidien, ces baskets offrent un confort exceptionnel et un style polyvalent.",
                "color" => "white",
                "size" => "ShoesSize_6",
                "price" => 24.99,
                "imageUrl" => "https://assets.adidas.com/images/w_600,f_auto,q_auto/a4d975e141054d24a0eaaae700d36352_9366/Chaussure_Superstar_Blanc_EG4960_01_standard.jpg"
            ],
            [
                "category" => "Category_2",
                "brand" => "Puma",
                "model" => "RS-X", 
                "type" => "ShoesType_0", 
                "description" => "Les Puma RS-X, des sneakers audacieuses au design futuriste. Avec leur combinaison de couleurs vibrantes et leur technologie de pointe, ces chaussures repoussent les limites du style.",
                "color" => "black",
                "size" => "ShoesSize_7",
                "price" => 29.99,
                "imageUrl" => "https://static.footshop.com/img/p/9/3/4/1/8/9/934189-full_product.jpg"
            ]
        ];

        foreach($shoesTab as $shoe) {
            $shoes = new Shoes();
            $shoes->setCategory($this->getReference($shoe["category"]));
            $shoes->setBrand($shoe["brand"]);
            $shoes->setModel($shoe["model"]);
            $shoes->setType($this->getReference($shoe["type"]));
            $shoes->setDescription($shoe["description"]);
            $shoes->setColor($shoe["color"]);
            $shoes->setSize($this->getReference($shoe["size"]));
            $shoes->setPrice($shoe["price"]);
            $shoes->setImageUrl($shoe["imageUrl"]);

            $manager->persist($shoes);
        }

        $manager->flush();
    }
}
