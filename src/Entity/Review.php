<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $content = null;

    #[ORM\Column]
    private ?int $stars = null;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Resident $resident = null;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    #[ORM\JoinColumn(nullable: false)]
    private ?OfferService $offerService = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getStars(): ?int
    {
        return $this->stars;
    }

    public function setStars(int $stars): static
    {
        $this->stars = $stars;

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

    public function getOfferService(): ?OfferService
    {
        return $this->offerService;
    }

    public function setOfferService(?OfferService $offerService): static
    {
        $this->offerService = $offerService;

        return $this;
    }
}
