<?php

namespace App\Entity;

use App\Repository\AnimalRepository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
#[Vich\Uploadable]
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
    #[ORM\JoinColumn(name: 'habitat_id', referencedColumnName: 'id', nullable: false)]
    private ?Habitat $habitat = null;

    #[ORM\OneToMany(targetEntity: RapportAnimal::class, mappedBy: 'Animal', orphanRemoval: true)]
    private Collection $rapportAnimals;

    #[ORM\OneToMany(targetEntity: Avis::class, mappedBy: 'animal', orphanRemoval: true)]
    private Collection $avis;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToOne(mappedBy: 'animal', cascade: ['persist', 'remove'])]
    private ?AlimentationJour $alimentationjour = null;

    #[Vich\UploadableField(mapping: 'Animal', fileNameProperty: 'imageName', size: 'imageSize')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?int $imageSize = null;



    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToMany(targetEntity: Habitat::class, mappedBy: 'Animal')]
    private Collection $habitats;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
   




    public function __construct()
    {
        $this->rapportAnimals = new ArrayCollection();
        $this->avis = new ArrayCollection();
        $this->habitats = new ArrayCollection();
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
        return $this->habitat;
    }

    public function setHabitat(?Habitat $Habitat): static
    {
        $this->habitat = $Habitat;

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

    public function getAlimentationjour(): ?Alimentationjour
    {
        return $this->alimentationjour;
    }

    public function setAlimentationjour(Alimentationjour $alimentationjour): static
    {
        // set the owning side of the relation if necessary
        if ($alimentationjour->getAnimal() !== $this) {
            $alimentationjour->setAnimal($this);
        }

        $this->alimentationjour = $alimentationjour;

        return $this;
    }
    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }
    // Remove the existing declaration of the $updatedAt property

    // Ajoutez les getters et setters pour la propriété $updatedAt

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return Collection<int, Habitat>
     */
    public function getHabitats(): Collection
    {
        return $this->habitats;
    }

    public function addHabitat(Habitat $habitat): static
    {
        if (!$this->habitats->contains($habitat)) {
            $this->habitats->add($habitat);
            $habitat->addAnimal($this);
        }

        return $this;
    }

    public function removeHabitat(Habitat $habitat): static
    {
        if ($this->habitats->removeElement($habitat)) {
            $habitat->removeAnimal($this);
        }

        return $this;
    }
}
