<?php

namespace App\DataFixtures;

use App\Entity\Category;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    private const CATEGORY_REFERENCE = "Category";

    public function load(ObjectManager $manager): void
    {
        $categories = [
            "Men",
            "Women",
            "Children"
        ];

        foreach($categories as $key => $cat) {
            $category = new Category();
            $category->setCategory($cat);
            $manager->persist($category);
            $this->addReference(self::CATEGORY_REFERENCE . '_' . $key, $category);
        }

        $manager->flush();
    }
}
