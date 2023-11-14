<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\HorairesOuvertureRepository;

#[ORM\Entity(repositoryClass: HorairesOuvertureRepository::class)]
class HorairesOuverture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $jours = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?DateTimeImmutable $debut_matin = null;
    public function __construct()
    {
        $this->debut_matin = new \DateTimeImmutable;
        $this->fin_matin = new \DateTimeImmutable;
        $this->debut_apresMidi = new \DateTimeImmutable;
        $this->fin_apresMidi = new \DateTimeImmutable;
    }

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $fin_matin = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $debut_apresMidi = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $fin_apresMidi = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_public = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJours(): ?string
    {
        return $this->jours;
    }

    public function setJours(?string $jours): static
    {
        $this->jours = $jours;

        return $this;
    }

    public function getDebutMatin(): ?\DateTimeImmutable
    {
        return $this->debut_matin;
    }

    public function setDebutMatin(?\DateTimeImmutable $debut_matin): static
    {
        $this->debut_matin = $debut_matin;

        return $this;
    }

    public function getFinMatin(): ?\DateTimeImmutable
    {
        return $this->fin_matin;
    }

    public function setFinMatin(?\DateTimeImmutable $fin_matin): static
    {
        $this->fin_matin = $fin_matin;

        return $this;
    }

    public function getDebutApresMidi(): ?\DateTimeImmutable
    {
        return $this->debut_apresMidi;
    }

    public function setDebutApresMidi(?\DateTimeImmutable $debut_apresMidi): static
    {
        $this->debut_apresMidi = $debut_apresMidi;

        return $this;
    }

    public function getFinApresMidi(): ?\DateTimeImmutable
    {
        return $this->fin_apresMidi;
    }

    public function setFinApresMidi(?\DateTimeImmutable $fin_apresMidi): static
    {
        $this->fin_apresMidi = $fin_apresMidi;

        return $this;
    }

    public function isIsPublic(): ?bool
    {
        return $this->is_public;
    }

    public function setIsPublic(?bool $is_public): static
    {
        $this->is_public = $is_public;

        return $this;
    }
}
