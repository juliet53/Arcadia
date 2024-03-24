<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $race = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Habitat $Habitat = null;

    #[ORM\OneToMany(targetEntity: RapportAnimal::class, mappedBy: 'Animal', orphanRemoval: true)]
    private Collection $rapportAnimals;

    #[ORM\OneToMany(targetEntity: Avis::class, mappedBy: 'animal', orphanRemoval: true)]
    private Collection $avis;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    public function __construct()
    {
        $this->rapportAnimals = new ArrayCollection();
        $this->avis = new ArrayCollection();
    }
    public function __toString(): string
    {
        return $this->nom;
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

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): static
    {
        $this->race = $race;

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

    public function getHabitat(): ?Habitat
    {
        return $this->Habitat;
    }

    public function setHabitat(?Habitat $Habitat): static
    {
        $this->Habitat = $Habitat;

        return $this;
    }

    /**
     * @return Collection<int, RapportAnimal>
     */
    public function getRapportAnimals(): Collection
    {
        return $this->rapportAnimals;
    }

    public function addRapportAnimal(RapportAnimal $rapportAnimal): static
    {
        if (!$this->rapportAnimals->contains($rapportAnimal)) {
            $this->rapportAnimals->add($rapportAnimal);
            $rapportAnimal->setAnimal($this);
        }

        return $this;
    }

    public function removeRapportAnimal(RapportAnimal $rapportAnimal): static
    {
        if ($this->rapportAnimals->removeElement($rapportAnimal)) {
            // set the owning side to null (unless already changed)
            if ($rapportAnimal->getAnimal() === $this) {
                $rapportAnimal->setAnimal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): static
    {
        if (!$this->avis->contains($avi)) {
            $this->avis->add($avi);
            $avi->setAnimal($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): static
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getAnimal() === $this) {
                $avi->setAnimal(null);
            }
        }

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
}
