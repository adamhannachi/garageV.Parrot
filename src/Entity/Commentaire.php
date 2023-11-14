<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $create_at = null;

    #[ORM\OneToMany(mappedBy: 'commentaire', targetEntity: Product::class)]
    private Collection $commenter;

    public function __construct()
    {
        $this->commenter = new ArrayCollection();
     $this->create_at = new \DateTimeImmutable;
    } 


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->create_at;
    }

    public function setCreateAt(?\DateTimeImmutable $create_at): static
    {
        $this->create_at = $create_at;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getCommenter(): Collection
    {
        return $this->commenter;
    }

    public function addCommenter(Product $commenter): static
    {
        if (!$this->commenter->contains($commenter)) {
            $this->commenter->add($commenter);
            $commenter->setCommentaire($this);
        }

        return $this;
    }

    public function removeCommenter(Product $commenter): static
    {
        if ($this->commenter->removeElement($commenter)) {
            // set the owning side to null (unless already changed)
            if ($commenter->getCommentaire() === $this) {
                $commenter->setCommentaire(null);
            }
        }

        return $this;
    }
}
