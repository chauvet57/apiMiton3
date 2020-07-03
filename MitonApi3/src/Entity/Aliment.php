<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AlimentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AlimentRepository::class)
 */
class Aliment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"recette"})
     * @ORM\Column(type="string", length=255)
     */
    private $nomAliment;

    /**
     * @Groups({"recette"})
     * @ORM\ManyToOne(targetEntity=CategorieAliment::class, inversedBy="aliments")
     */
    private $categorieAliment;

    /**
     * @ORM\OneToMany(targetEntity=Ingredient::class, mappedBy="aliment")
     */
    private $ingredients;

    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAliment(): ?string
    {
        return $this->nomAliment;
    }

    public function setNomAliment(string $nomAliment): self
    {
        $this->nomAliment = $nomAliment;

        return $this;
    }

    public function getCategorieAliment(): ?CategorieAliment
    {
        return $this->categorieAliment;
    }

    public function setCategorieAliment(?CategorieAliment $categorieAliment): self
    {
        $this->categorieAliment = $categorieAliment;

        return $this;
    }

    /**
     * @return Collection|Ingredient[]
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
            $ingredient->setAliment($this);
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        if ($this->ingredients->contains($ingredient)) {
            $this->ingredients->removeElement($ingredient);
            // set the owning side to null (unless already changed)
            if ($ingredient->getAliment() === $this) {
                $ingredient->setAliment(null);
            }
        }

        return $this;
    }
}
