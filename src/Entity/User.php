<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\OneToMany(targetEntity: RapportHabitat::class, mappedBy: 'user')]
    private Collection $rapportHabitats;

    #[ORM\OneToMany(targetEntity: RapportAnimal::class, mappedBy: 'user', orphanRemoval: true)]
    private Collection $rapportAnimals;

    #[ORM\OneToMany(targetEntity: Avis::class, mappedBy: 'user')]
    private Collection $avis;

    public function __construct()
    {
        $this->rapportHabitats = new ArrayCollection();
        $this->rapportAnimals = new ArrayCollection();
        $this->avis = new ArrayCollection();
    }
    public function __toString(): string
    {
        return $this->getEmail();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
            $rapportHabitat->setUser($this);
        }

        return $this;
    }

    public function removeRapportHabitat(RapportHabitat $rapportHabitat): static
    {
        if ($this->rapportHabitats->removeElement($rapportHabitat)) {
            // set the owning side to null (unless already changed)
            if ($rapportHabitat->getUser() === $this) {
                $rapportHabitat->setUser(null);
            }
        }

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
            $rapportAnimal->setUser($this);
        }

        return $this;
    }

    public function removeRapportAnimal(RapportAnimal $rapportAnimal): static
    {
        if ($this->rapportAnimals->removeElement($rapportAnimal)) {
            // set the owning side to null (unless already changed)
            if ($rapportAnimal->getUser() === $this) {
                $rapportAnimal->setUser(null);
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
            $avi->setUser($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): static
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getUser() === $this) {
                $avi->setUser(null);
            }
        }

        return $this;
    }
}
