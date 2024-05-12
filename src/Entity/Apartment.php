<?php

namespace App\Entity;

use App\Repository\ApartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApartmentRepository::class)]
class Apartment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $number = null;

    #[ORM\ManyToOne(inversedBy: 'apartments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Bloc $bloc = null;

    #[ORM\OneToMany(targetEntity: Occuption::class, mappedBy: 'apartment')]
    private Collection $occuptions;

    public function __construct()
    {
        $this->occuptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getBloc(): ?Bloc
    {
        return $this->bloc;
    }

    public function setBloc(?Bloc $bloc): static
    {
        $this->bloc = $bloc;

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
            $occuption->setApartment($this);
        }

        return $this;
    }

    public function removeOccuption(Occuption $occuption): static
    {
        if ($this->occuptions->removeElement($occuption)) {
            // set the owning side to null (unless already changed)
            if ($occuption->getApartment() === $this) {
                $occuption->setApartment(null);
            }
        }

        return $this;
    }
}
