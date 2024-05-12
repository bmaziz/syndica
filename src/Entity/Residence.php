<?php

namespace App\Entity;

use App\Repository\ResidenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResidenceRepository::class)]
class Residence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $capacity = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $street = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\OneToMany(targetEntity: Bloc::class, mappedBy: 'residence')]
    private Collection $blocs;

    #[ORM\OneToMany(targetEntity: ManagerResidence::class, mappedBy: 'residence')]
    private Collection $managerResidences;

    public function __construct()
    {
        $this->blocs = new ArrayCollection();
        $this->managerResidences = new ArrayCollection();
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

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): static
    {
        $this->street = $street;

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

    /**
     * @return Collection<int, Bloc>
     */
    public function getBlocs(): Collection
    {
        return $this->blocs;
    }

    public function addBloc(Bloc $bloc): static
    {
        if (!$this->blocs->contains($bloc)) {
            $this->blocs->add($bloc);
            $bloc->setResidence($this);
        }

        return $this;
    }

    public function removeBloc(Bloc $bloc): static
    {
        if ($this->blocs->removeElement($bloc)) {
            // set the owning side to null (unless already changed)
            if ($bloc->getResidence() === $this) {
                $bloc->setResidence(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ManagerResidence>
     */
    public function getManagerResidences(): Collection
    {
        return $this->managerResidences;
    }

    public function addManagerResidence(ManagerResidence $managerResidence): static
    {
        if (!$this->managerResidences->contains($managerResidence)) {
            $this->managerResidences->add($managerResidence);
            $managerResidence->setResidence($this);
        }

        return $this;
    }

    public function removeManagerResidence(ManagerResidence $managerResidence): static
    {
        if ($this->managerResidences->removeElement($managerResidence)) {
            // set the owning side to null (unless already changed)
            if ($managerResidence->getResidence() === $this) {
                $managerResidence->setResidence(null);
            }
        }

        return $this;
    }
}
