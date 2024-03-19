<?php

namespace App\Entity;

use App\Repository\FormRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormRepository::class)]
class Form
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $formName = null;

    #[ORM\Column(length: 255)]
    private ?string $formEmail = null;

    #[ORM\Column(length: 255)]
    private ?string $formPhone = null;

    #[ORM\Column(length: 255)]
    private ?string $formSubject = null;

    #[ORM\Column(length: 255)]
    private ?string $formMessage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormName(): ?string
    {
        return $this->formName;
    }

    public function setFormName(string $formName): static
    {
        $this->formName = $formName;

        return $this;
    }

    public function getFormEmail(): ?string
    {
        return $this->formEmail;
    }

    public function setFormEmail(string $formEmail): static
    {
        $this->formEmail = $formEmail;

        return $this;
    }

    public function getFormPhone(): ?string
    {
        return $this->formPhone;
    }

    public function setFormPhone(string $formPhone): static
    {
        $this->formPhone = $formPhone;

        return $this;
    }

    public function getFormSubject(): ?string
    {
        return $this->formSubject;
    }

    public function setFormSubject(string $formSubject): static
    {
        $this->formSubject = $formSubject;

        return $this;
    }

    public function getFormMessage(): ?string
    {
        return $this->formMessage;
    }

    public function setFormMessage(string $formMessage): static
    {
        $this->formMessage = $formMessage;

        return $this;
    }
}
