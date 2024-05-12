<?php

namespace App\Entity;

use App\Repository\OccuptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OccuptionRepository::class)]
class Occuption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'occuptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Resident $resident = null;

    #[ORM\ManyToOne(inversedBy: 'occuptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Apartment $apartment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getResident(): ?Resident
    {
        return $this->resident;
    }

    public function setResident(?Resident $resident): static
    {
        $this->resident = $resident;

        return $this;
    }

    public function getApartment(): ?Apartment
    {
        return $this->apartment;
    }

    public function setApartment(?Apartment $apartment): static
    {
        $this->apartment = $apartment;

        return $this;
    }
}
