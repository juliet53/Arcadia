<?php

namespace App\Entity;

use App\Repository\HabitatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HabitatRepository::class)]
class Habitat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToMany(targetEntity: Animal::class, mappedBy: 'Habitat')]
    private Collection $animals;

    #[ORM\OneToMany(targetEntity: RapportHabitat::class, mappedBy: 'Habitat')]
    private Collection $rapportHabitats;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
        $this->rapportHabitats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal): static
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
            $animal->setHabitat($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): static
    {
        if ($this->animals->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getHabitat() === $this) {
                $animal->setHabitat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RapportHabitat>
     */
    public function getRapportHabitats(): Collection
    {
        return $this->rapportHabitats;
    }

    public function addRapportHabitat(RapportHabitat $rapportHabitat): static
    {
        if (!$this->rapportHabitats->contains($rapportHabitat)) {
            $this->rapportHabitats->add($rapportHabitat);
            $rapportHabitat->setHabitat($this);
        }

        return $this;
    }

    public function removeRapportHabitat(RapportHabitat $rapportHabitat): static
    {
        if ($this->rapportHabitats->removeElement($rapportHabitat)) {
            // set the owning side to null (unless already changed)
            if ($rapportHabitat->getHabitat() === $this) {
                $rapportHabitat->setHabitat(null);
            }
        }

        return $this;
    }
}
