<?php

namespace App\Entity;

use App\Entity\Property;
use App\Entity\Traits\TimestampTraits;
use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: PictureRepository::class)]
#[Vich\Uploadable]
#[ORM\HasLifecycleCallbacks]
class Picture
{
    use TimestampTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $imageSize = null;

    #[ORM\Column(nullable: true)]
    private ?string $attachment = null;

    #[vich\UploadableField(mapping: 'products', fileNameProperty:'attachment')]
    private ?File $attachmentFile = null;

    #[ORM\ManyToOne(targetEntity:"App\Entity\Property", inversedBy: 'Picture')]
    private ?Property $property = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    public function setImageSize(?int $imageSize): static
    {
        $this->imageSize = $imageSize;

        return $this;
    }

    public function getProperty(): ?Property
    {
        return $this->property;
    }

    public function setProperty(?Property $property): static
    {
        $this->property = $property;

        return $this;
    }

    public function getAttachment(): ?string
    {
        return $this->attachment;
    }

    public function setAttachment(?string $attachment): void
    {
        $this->attachment = $attachment;
    }

    public function getAttachmentFile(): ?File
    {
        return $this->attachmentFile;
    }

    public function setAttachmentFile(?File $attachmentFile = null): void
    {
        $this->attachmentFile = $attachmentFile;

        if (null !== $attachmentFile){
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    
}
