<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $name = null;

    #[ORM\Column(length: 200)]
    private ?string $events = null;

    #[ORM\Column(length: 255)]
    private ?string $dp = null;

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

    public function getEvents(): ?string
    {
        return $this->events;
    }

    public function setEvents(string $events): static
    {
        $this->events = $events;

        return $this;
    }

    public function getDp(): ?string
    {
        return $this->dp;
    }

    public function setDp(string $dp): static
    {
        $this->dp = $dp;

        return $this;
    }
}
