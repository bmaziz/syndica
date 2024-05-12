<?php

namespace App\Entity;

use App\Repository\OfferServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OfferServiceRepository::class)]
class OfferService
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\ManyToOne(inversedBy: 'offerServices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Provider $povider = null;

    #[ORM\ManyToOne(inversedBy: 'offerServices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Service $service = null;

    #[ORM\OneToMany(targetEntity: DemandeService::class, mappedBy: 'offerService')]
    private Collection $demandeServices;

    #[ORM\OneToMany(targetEntity: Review::class, mappedBy: 'offerService')]
    private Collection $reviews;

    public function __construct()
    {
        $this->demandeServices = new ArrayCollection();
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getPovider(): ?Provider
    {
        return $this->povider;
    }

    public function setPovider(?Provider $povider): static
    {
        $this->povider = $povider;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): static
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return Collection<int, DemandeService>
     */
    public function getDemandeServices(): Collection
    {
        return $this->demandeServices;
    }

    public function addDemandeService(DemandeService $demandeService): static
    {
        if (!$this->demandeServices->contains($demandeService)) {
            $this->demandeServices->add($demandeService);
            $demandeService->setOfferService($this);
        }

        return $this;
    }

    public function removeDemandeService(DemandeService $demandeService): static
    {
        if ($this->demandeServices->removeElement($demandeService)) {
            // set the owning side to null (unless already changed)
            if ($demandeService->getOfferService() === $this) {
                $demandeService->setOfferService(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): static
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setOfferService($this);
        }

        return $this;
    }

    public function removeReview(Review $review): static
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getOfferService() === $this) {
                $review->setOfferService(null);
            }
        }

        return $this;
    }
}
