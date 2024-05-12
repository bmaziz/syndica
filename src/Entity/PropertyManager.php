<?php

namespace App\Entity;

use App\Repository\PropertyManagerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PropertyManagerRepository::class)]
class PropertyManager
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
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\Column(length: 8)]
    private ?string $phone = null;

    #[ORM\OneToMany(targetEntity: ManagerResidence::class, mappedBy: 'manager')]
    private Collection $managerResidences;

    public function __construct()
    {
        $this->managerResidences = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

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
            $managerResidence->setManager($this);
        }

        return $this;
    }

    public function removeManagerResidence(ManagerResidence $managerResidence): static
    {
        if ($this->managerResidences->removeElement($managerResidence)) {
            // set the owning side to null (unless already changed)
            if ($managerResidence->getManager() === $this) {
                $managerResidence->setManager(null);
            }
        }

        return $this;
    }
}
