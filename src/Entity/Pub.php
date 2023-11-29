<?php

namespace App\Entity;

use App\Repository\PubRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PubRepository::class)]
class Pub
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $choix_evenement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nom_utilisateur;
    }

    public function setNomUtilisateur(string $nom_utilisateur): static
    {
        $this->nom_utilisateur = $nom_utilisateur;

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
}
