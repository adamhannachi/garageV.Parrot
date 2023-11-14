<?php

namespace App\Entity;

use App\Repository\ServiceGarageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ServiceGarageRepository::class)]
#[Vich\Uploadable]
class ServiceGarage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;



        // ... other fields

    // NOTE: This is not a mapped field of entity metadata, just a simple property.
    #[Vich\UploadableField(mapping: 'voiture_images', fileNameProperty: 'image' )]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $image = null;

    

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;


    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $services = null;

 

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $servicereparation = null;

    #[ORM\Column(nullable: true)]
    private ?int $tarifs = null;

    #[ORM\Column(nullable: true)]
    private ?int $telephone = null;

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getDescription(): ?string
    {
        return $this->Description;
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
   

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getServices(): ?string
    {
        return $this->services;
    }

  


    public function getServicereparation(): ?string
    {
        return $this->servicereparation;
    }

    public function setServicereparation(?string $servicereparation): static
    {
        $this->servicereparation = $servicereparation;

        return $this;
    }

    public function getTarifs(): ?int
    {
        return $this->tarifs;
    }

    public function setTarifs(?int $tarifs): static
    {
        $this->tarifs = $tarifs;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }
}
