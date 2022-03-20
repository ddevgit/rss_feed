<?php

namespace App\Entity;

use App\Repository\FeedRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FeedRepository::class)]
class Feed
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $lastTime;

    public function __construct()
    {
        $this->lastTime =  new DateTime('@'.strtotime('now'));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastTime(): ?\DateTimeInterface
    {
        return $this->lastTime;
    }

    public function setLastTime(?\DateTimeInterface $lastTime): self
    {
        $this->lastTime = $lastTime;

        return $this;
    }
}
