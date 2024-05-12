<?php

namespace App\Entity;

use App\Repository\DemandeServiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeServiceRepository::class)]
class DemandeService
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?bool $confirmed = null;

    #[ORM\ManyToOne(inversedBy: 'demandeServices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?OfferService $offerService = null;

    #[ORM\ManyToOne(inversedBy: 'demandeServices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Resident $resident = null;

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

    public function isConfirmed(): ?bool
    {
        return $this->confirmed;
    }

    public function setConfirmed(bool $confirmed): static
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    public function getOfferService(): ?OfferService
    {
        return $this->offerService;
    }

    public function setOfferService(?OfferService $offerService): static
    {
        $this->offerService = $offerService;

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
}
