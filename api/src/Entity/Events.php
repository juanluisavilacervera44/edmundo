<?php

namespace App\Entity;

use App\Repository\EventsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventsRepository::class)]
#[ORM\Table(name: '`events`',schema: 'edmundoschema')]
class Events
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 1000)]
    private ?string $text = null;

    #[ORM\Column(length: 100)]
    private ?string $notification = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $repeatNotification = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $repeatEvent = null;

    #[ORM\Column(length: 7)]
    private ?string $colour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getNotification(): ?string
    {
        return $this->notification;
    }

    public function setNotification(string $notification): self
    {
        $this->notification = $notification;

        return $this;
    }

    public function getRepeatNotification(): ?string
    {
        return $this->repeatNotification;
    }

    public function setRepeatNotification(?string $repeatNotification): self
    {
        $this->repeatNotification = $repeatNotification;

        return $this;
    }

    public function getRepeatEvent(): ?string
    {
        return $this->repeatEvent;
    }

    public function setRepeatEvent(?string $repeatEvent): self
    {
        $this->repeatEvent = $repeatEvent;

        return $this;
    }

    public function getColour(): ?string
    {
        return $this->colour;
    }

    public function setColour(string $colour): self
    {
        $this->colour = $colour;

        return $this;
    }
}
