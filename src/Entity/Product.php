<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $operating_system;

    #[ORM\Column(type: 'integer')]
    private $megapixels;

    #[ORM\Column(type: 'string', length: 255)]
    private $brand;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: ProductDeclination::class, orphanRemoval: true)]
    private $productDeclinations;

    public function __construct()
    {
        $this->productDeclinations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getOperatingSystem(): ?string
    {
        return $this->operating_system;
    }

    public function setOperatingSystem(string $operating_system): self
    {
        $this->operating_system = $operating_system;

        return $this;
    }

    public function getMegapixels(): ?int
    {
        return $this->megapixels;
    }

    public function setMegapixels(int $megapixels): self
    {
        $this->megapixels = $megapixels;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Collection<int, ProductDeclination>
     */
    public function getProductDeclinations(): Collection
    {
        return $this->productDeclinations;
    }

    public function addProductDeclination(ProductDeclination $productDeclination): self
    {
        if (!$this->productDeclinations->contains($productDeclination)) {
            $this->productDeclinations[] = $productDeclination;
            $productDeclination->setProduct($this);
        }

        return $this;
    }

    public function removeProductDeclination(ProductDeclination $productDeclination): self
    {
        if ($this->productDeclinations->removeElement($productDeclination)) {
            // set the owning side to null (unless already changed)
            if ($productDeclination->getProduct() === $this) {
                $productDeclination->setProduct(null);
            }
        }

        return $this;
    }
}
