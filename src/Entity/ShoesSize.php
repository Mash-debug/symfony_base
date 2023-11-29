<?php

namespace App\Entity;

use App\Repository\ShoesSizeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShoesSizeRepository::class)]
class ShoesSize
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $size = null;

    #[ORM\OneToMany(mappedBy: 'size', targetEntity: Shoes::class)]
    private Collection $shoes;

    public function __construct()
    {
        $this->shoes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): static
    {
        $this->size = $size;

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
            $shoe->setSize($this);
        }

        return $this;
    }

    public function removeShoe(Shoes $shoe): static
    {
        if ($this->shoes->removeElement($shoe)) {
            // set the owning side to null (unless already changed)
            if ($shoe->getSize() === $this) {
                $shoe->setSize(null);
            }
        }

        return $this;
    }
}
