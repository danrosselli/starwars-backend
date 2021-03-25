<?php

namespace App\Entity;

use App\Repository\PeopleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PeopleRepository::class)
 */
class People
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idx;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $doc = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdx(): ?int
    {
        return $this->idx;
    }

    public function setIdx(?int $idx): self
    {
        $this->idx = $idx;

        return $this;
    }

    public function getDoc(): ?array
    {
        return $this->doc;
    }

    public function setDoc(?array $doc): self
    {
        $this->doc = $doc;

        return $this;
    }
}
