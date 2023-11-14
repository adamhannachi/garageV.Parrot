<?php

namespace App\Entity;

use App\Repository\ContactAnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactAnnonceRepository::class)]
class ContactAnnonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $sujet = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    #[ORM\ManyToMany(targetEntity: Product::class, inversedBy: 'contactAnnonces')]
    private Collection $nameAnnonce;

    public function __construct()
    {
        $this->nameAnnonce = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
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

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): static
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getNameAnnonce(): Collection
    {
        return $this->nameAnnonce;
    }

    public function addNameAnnonce(Product $nameAnnonce): static
    {
        if (!$this->nameAnnonce->contains($nameAnnonce)) {
            $this->nameAnnonce->add($nameAnnonce);
        }

        return $this;
    }

    public function removeNameAnnonce(Product $nameAnnonce): static
    {
        $this->nameAnnonce->removeElement($nameAnnonce);

        return $this;
    }

    public function __toString()
    {
        return $this->firstName;
        return $this->nameAnnonce;
    }
   
}
