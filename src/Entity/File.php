<?php

namespace App\Entity;

use App\Repository\FileRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: FileRepository::class)]
#[ApiResource]
class File
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $content = null;

    /**
     * Obtenir l'identifiant du fichier.
     *
     * @return int|null Identifiant du fichier.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Obtenir le contenu du fichier.
     *
     * @return string Contenu du fichier.
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
