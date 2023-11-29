<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Shoes::class)]
    private Collection $shoes;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Clothes::class)]
    private Collection $clothes;

    public function __construct()
    {
        $this->shoes = new ArrayCollection();
        $this->clothes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Shoes>
     */
    public function getShoes(): Collection
    {
        return $this->shoes;
    }

    public function addShoe(Shoes $shoe): static
    {
        if (!$this->shoes->contains($shoe)) {
            $this->shoes->add($shoe);
            $shoe->setCategory($this);
        }

        return $this;
    }

    public function removeShoe(Shoes $shoe): static
    {
        if ($this->shoes->removeElement($shoe)) {
            // set the owning side to null (unless already changed)
            if ($shoe->getCategory() === $this) {
                $shoe->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Clothes>
     */
    public function getClothes(): Collection
    {
        return $this->clothes;
    }

    public function addClothes(Clothes $clothes): static
    {
        if (!$this->clothes->contains($clothes)) {
            $this->clothes->add($clothes);
            $clothes->setCategory($this);
        }

        return $this;
    }

    public function removeClothes(Clothes $clothes): static
    {
        if ($this->clothes->removeElement($clothes)) {
            // set the owning side to null (unless already changed)
            if ($clothes->getCategory() === $this) {
                $clothes->setCategory(null);
            }
        }

        return $this;
    }
}
