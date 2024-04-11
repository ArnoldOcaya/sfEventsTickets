<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketRepository::class)]
class Ticket
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $event = null;

    #[ORM\Column(length: 200)]
    private ?string $type = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $price = null;

    #[ORM\Column]
    private ?int $quantityAvailable = null;

    #[ORM\Column]
    private ?int $quantitySold = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $saleStartdate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $saleEnddate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvent(): ?string
    {
        return $this->event;
    }

    public function setEvent(string $event): static
    {
        $this->event = $event;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantityAvailable(): ?int
    {
        return $this->quantityAvailable;
    }

    public function setQuantityAvailable(int $quantityAvailable): static
    {
        $this->quantityAvailable = $quantityAvailable;

        return $this;
    }

    public function getQuantitySold(): ?int
    {
        return $this->quantitySold;
    }

    public function setQuantitySold(int $quantitySold): static
    {
        $this->quantitySold = $quantitySold;

        return $this;
    }

    public function getSaleStartdate(): ?\DateTimeInterface
    {
        return $this->saleStartdate;
    }

    public function setSaleStartdate(\DateTimeInterface $saleStartdate): static
    {
        $this->saleStartdate = $saleStartdate;

        return $this;
    }

    public function getSaleEnddate(): ?\DateTimeInterface
    {
        return $this->saleEnddate;
    }

    public function setSaleEnddate(\DateTimeInterface $saleEnddate): static
    {
        $this->saleEnddate = $saleEnddate;

        return $this;
    }
}
