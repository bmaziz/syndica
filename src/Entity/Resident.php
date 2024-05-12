<?php

namespace App\Entity;

use App\Repository\ResidentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResidentRepository::class)]
class Resident
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 8)]
    private ?string $cin = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\Column(length: 8)]
    private ?string $phone = null;

    #[ORM\OneToMany(targetEntity: DemandeService::class, mappedBy: 'resident')]
    private Collection $demandeServices;

    #[ORM\OneToMany(targetEntity: Review::class, mappedBy: 'resident')]
    private Collection $reviews;

    #[ORM\OneToMany(targetEntity: Occuption::class, mappedBy: 'resident')]
    private Collection $occuptions;

    public function __construct()
    {
        $this->demandeServices = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->occuptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): static
    {
        $this->cin = $cin;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): static
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): static
    {
        $this->phone = $phone;

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
            $demandeService->setResident($this);
        }

        return $this;
    }

    public function removeDemandeService(DemandeService $demandeService): static
    {
        if ($this->demandeServices->removeElement($demandeService)) {
            // set the owning side to null (unless already changed)
            if ($demandeService->getResident() === $this) {
                $demandeService->setResident(null);
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
            $review->setResident($this);
        }

        return $this;
    }

    public function removeReview(Review $review): static
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getResident() === $this) {
                $review->setResident(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Occuption>
     */
    public function getOccuptions(): Collection
    {
        return $this->occuptions;
    }

    public function addOccuption(Occuption $occuption): static
    {
        if (!$this->occuptions->contains($occuption)) {
            $this->occuptions->add($occuption);
            $occuption->setResident($this);
        }

        return $this;
    }

    public function removeOccuption(Occuption $occuption): static
    {
        if ($this->occuptions->removeElement($occuption)) {
            // set the owning side to null (unless already changed)
            if ($occuption->getResident() === $this) {
                $occuption->setResident(null);
            }
        }

        return $this;
    }
}
