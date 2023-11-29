<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_evenement = null;

    #[ORM\Column(length: 255)]
    private ?string $choix_evenement = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description_evenement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->date_evenement;
    }

    public function setDateEvenement(\DateTimeInterface $date_evenement): static
    {
        $this->date_evenement = $date_evenement;

        return $this;
    }

    public function getChoixEvenement(): ?string
    {
        return $this->choix_evenement;
    }

    public function setChoixEvenement(string $choix_evenement): static
    {
        $this->choix_evenement = $choix_evenement;

        return $this;
    }

    public function getDescriptionEvenement(): ?string
    {
        return $this->description_evenement;
    }

    public function setDescriptionEvenement(string $description_evenement): static
    {
        $this->description_evenement = $description_evenement;

        return $this;
    }
    // App\Entity\Evenement

/**
 * @ORM\Column(type="string")
 */
private $title;

public function getTitle(): ?string
{
    return $this->title;
}

public function setTitle(string $title): self
{
    $this->title = $title;

    return $this;
}

}
