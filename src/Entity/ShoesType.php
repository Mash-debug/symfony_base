<?php

namespace App\Entity;

use App\Repository\ShoesTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShoesTypeRepository::class)]
class ShoesType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Shoes::class)]
    private Collection $shoes;

    public function __construct()
    {
        $this->shoes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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
            $shoe->setType($this);
        }

        return $this;
    }

    public function removeShoe(Shoes $shoe): static
    {
        if ($this->shoes->removeElement($shoe)) {
            // set the owning side to null (unless already changed)
            if ($shoe->getType() === $this) {
                $shoe->setType(null);
            }
        }

        return $this;
    }
}
