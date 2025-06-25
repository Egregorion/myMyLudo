<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['categories']]
)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('categories')]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    #[Groups('categories')]
    private ?string $name = null;

    /**
     * @var Collection<int, Boardgame>
     */
    #[ORM\ManyToMany(targetEntity: Boardgame::class, mappedBy: 'categories')]
    private Collection $boardgames;

    public function __construct()
    {
        $this->boardgames = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Boardgame>
     */
    public function getBoardgames(): Collection
    {
        return $this->boardgames;
    }

    public function addBoardgame(Boardgame $boardgame): static
    {
        if (!$this->boardgames->contains($boardgame)) {
            $this->boardgames->add($boardgame);
            $boardgame->addCategory($this);
        }

        return $this;
    }

    public function removeBoardgame(Boardgame $boardgame): static
    {
        if ($this->boardgames->removeElement($boardgame)) {
            $boardgame->removeCategory($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
