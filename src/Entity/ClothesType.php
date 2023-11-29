<?php

namespace App\Entity;

use App\Repository\ClothesTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClothesTypeRepository::class)]
class ClothesType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Clothes::class)]
    private Collection $clothes;

    public function __construct()
    {
        $this->clothes = new ArrayCollection();
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
            $clothes->setType($this);
        }

        return $this;
    }

    public function removeClothes(Clothes $clothes): static
    {
        if ($this->clothes->removeElement($clothes)) {
            // set the owning side to null (unless already changed)
            if ($clothes->getType() === $this) {
                $clothes->setType(null);
            }
        }

        return $this;
    }
}
