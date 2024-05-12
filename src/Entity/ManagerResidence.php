<?php

namespace App\Entity;

use App\Repository\ManagerResidenceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ManagerResidenceRepository::class)]
class ManagerResidence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'managerResidences')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PropertyManager $manager = null;

    #[ORM\ManyToOne(inversedBy: 'managerResidences')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Residence $residence = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Owner_since = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $left_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getManager(): ?PropertyManager
    {
        return $this->manager;
    }

    public function setManager(?PropertyManager $manager): static
    {
        $this->manager = $manager;

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

    public function getOwnerSince(): ?\DateTimeInterface
    {
        return $this->Owner_since;
    }

    public function setOwnerSince(\DateTimeInterface $Owner_since): static
    {
        $this->Owner_since = $Owner_since;

        return $this;
    }

    public function getLeftAt(): ?\DateTimeInterface
    {
        return $this->left_at;
    }

    public function setLeftAt(?\DateTimeInterface $left_at): static
    {
        $this->left_at = $left_at;

        return $this;
    }
}
