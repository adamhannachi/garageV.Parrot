<?php

namespace App\Entity;



use App\Entity\Categories;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Cascade;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[Vich\Uploadable]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: "Nom voiture doit comporter au moins {{ limit }} caractères",
        maxMessage: "Nom voiture doit comporter au moins {{ limit }} caractères",
    )]
    private ?string $name = null;

        // ... other fields

    // NOTE: This is not a mapped field of entity metadata, just a simple property.
    #[Vich\UploadableField(mapping: 'voiture_images', fileNameProperty: 'image' )]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $image = null;

    

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;


    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?int $kilometrage = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?int $years = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    

    #[ORM\Column]
    private ?bool $promo = null;

    #[ORM\ManyToMany(targetEntity: Categories::class, inversedBy: 'products')]
    private Collection $category;

    #[ORM\ManyToMany(targetEntity: ContactAnnonce::class, mappedBy: 'nameAnnonce')]
    private Collection $contactAnnonces;


    private ?float $moyenne = null;

    #[ORM\ManyToOne(inversedBy: 'commenter')]
    private ?Commentaire $commentaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $huile = null;

    

    #[ORM\Column(nullable: true)]
    private ?int $nombreDePlace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $boiteDeVitesses = null;

    #[ORM\Column(nullable: true)]
    private ?int $numeroTelephone = null;

  

    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->contactAnnonces = new ArrayCollection();
      
      
        
      
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }
   





    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): static
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getYears(): ?int
    {
        return $this->years;
    }

    public function setYears(int $years): static
    {
        $this->years = $years;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

   

    public function isPromo(): ?bool
    {
        return $this->promo;
    }

    public function setPromo(bool $promo): static
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Categories $category): static
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
        }

        return $this;
    }

    public function removeCategory(Categories $category): static
    {
        $this->category->removeElement($category);

        return $this;
    }

    /**
     * @return Collection<int, ContactAnnonce>
     */
    public function getContactAnnonces(): Collection
    {
        return $this->contactAnnonces;
    }

    public function addContactAnnonce(ContactAnnonce $contactAnnonce): static
    {
        if (!$this->contactAnnonces->contains($contactAnnonce)) {
            $this->contactAnnonces->add($contactAnnonce);
           
        }

        return $this;
    }

    public function removeContactAnnonce(ContactAnnonce $contactAnnonce): static
    {
        if ($this->contactAnnonces->removeElement($contactAnnonce)) {
           
        }

        return $this;
    }

 
    public function __toString()
    {
        return $this->name;
     
    }

    public function getMoyenne()
    {
       $notes= $this->notes;
 
       if($notes->toArray()== []){
          $this->moyenne = null;
          return $this->moyenne;
       }
       $total =0;
        foreach($notes as $note){
          $total+=$note->getNote();
        }
        $this->moyenne = $total / count($notes);
        return $this->moyenne;
    }

    public function getCommentaire(): ?Commentaire
    {
        return $this->commentaire;
    }

    public function setCommentaire(?Commentaire $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getHuile(): ?string
    {
        return $this->huile;
    }

    public function setHuile(?string $huile): static
    {
        $this->huile = $huile;

        return $this;
    }

   

    public function getNombreDePlace(): ?int
    {
        return $this->nombreDePlace;
    }

    public function setNombreDePlace(?int $nombreDePlace): static
    {
        $this->nombreDePlace = $nombreDePlace;

        return $this;
    }

    public function getBoiteDeVitesses(): ?string
    {
        return $this->boiteDeVitesses;
    }

    public function setBoiteDeVitesses(?string $boiteDeVitesses): static
    {
        $this->boiteDeVitesses = $boiteDeVitesses;

        return $this;
    }

    public function getNumeroTelephone(): ?int
    {
        return $this->numeroTelephone;
    }

    public function setNumeroTelephone(?int $numeroTelephone): static
    {
        $this->numeroTelephone = $numeroTelephone;

        return $this;
    }

   

   
 
}
