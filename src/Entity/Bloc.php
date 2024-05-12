<?php

namespace App\Entity;

use App\Repository\BlocRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlocRepository::class)]
class Bloc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $floor = null;

    #[ORM\ManyToOne(inversedBy: 'blocs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Residence $residence = null;

    #[ORM\OneToMany(targetEntity: Apartment::class, mappedBy: 'bloc')]
    private Collection $apartments;

    public function __construct()
    {
        $this->apartments = new ArrayCollection();
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

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function setFloor(int $floor): static
    {
        $this->floor = $floor;

        return $this;
    }

    public function getResidence(): ?Residence
    {
        return $this->residence;
    }

    public function setResidence(?Residence $residence): static
    {
        $this->residence = $residence;

        return $this;
    }

    /**
     * @return Collection<int, Apartment>
     */
    public function getApartments(): Collection
    {
        return $this->apartments;
    }

    public function addApartment(Apartment $apartment): static
    {
        if (!$this->apartments->contains($apartment)) {
            $this->apartments->add($apartment);
            $apartment->setBloc($this);
        }

        return $this;
    }

    public function removeApartment(Apartment $apartment): static
    {
        if ($this->apartments->removeElement($apartment)) {
            // set the owning side to null (unless already changed)
            if ($apartment->getBloc() === $this) {
                $apartment->setBloc(null);
            }
        }

        return $this;
    }
}
