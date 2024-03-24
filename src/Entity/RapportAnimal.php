<?php

namespace App\Entity;

use App\Repository\RapportAnimalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RapportAnimalRepository::class)]
class RapportAnimal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $etat = null;

    #[ORM\Column(length: 255)]
    private ?string $nourriturepropose = null;

    #[ORM\Column(length: 255)]
    private ?string $grammageNourriture = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datePassage = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $detailEtatAnimal = null;

    #[ORM\ManyToOne(inversedBy: 'rapportAnimals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $Animal = null;

    #[ORM\ManyToOne(inversedBy: 'rapportAnimals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getNourriturepropose(): ?string
    {
        return $this->nourriturepropose;
    }

    public function setNourriturepropose(string $nourriturepropose): static
    {
        $this->nourriturepropose = $nourriturepropose;

        return $this;
    }

    public function getGrammageNourriture(): ?string
    {
        return $this->grammageNourriture;
    }

    public function setGrammageNourriture(string $grammageNourriture): static
    {
        $this->grammageNourriture = $grammageNourriture;

        return $this;
    }

    public function getDatePassage(): ?\DateTimeInterface
    {
        return $this->datePassage;
    }

    public function setDatePassage(\DateTimeInterface $datePassage): static
    {
        $this->datePassage = $datePassage;

        return $this;
    }

    public function getDetailEtatAnimal(): ?string
    {
        return $this->detailEtatAnimal;
    }

    public function setDetailEtatAnimal(?string $detailEtatAnimal): static
    {
        $this->detailEtatAnimal = $detailEtatAnimal;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->Animal;
    }

    public function setAnimal(?Animal $Animal): static
    {
        $this->Animal = $Animal;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
