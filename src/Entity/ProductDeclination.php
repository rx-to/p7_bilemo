<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductDeclinationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductDeclinationRepository::class)]
#[ApiResource]
class ProductDeclination
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $color;

    #[ORM\Column(type: 'integer')]
    private $storage;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'productDeclinations')]
    #[ORM\JoinColumn(nullable: false)]
    private $product;

    #[ORM\OneToMany(mappedBy: 'product_declination', targetEntity: CustomerProductDeclination::class, orphanRemoval: true)]
    private $customerProductDeclinations;

    public function __construct()
    {
        $this->customerProductDeclinations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getStorage(): ?int
    {
        return $this->storage;
    }

    public function setStorage(int $storage): self
    {
        $this->storage = $storage;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Collection<int, CustomerProductDeclination>
     */
    public function getCustomerProductDeclinations(): Collection
    {
        return $this->customerProductDeclinations;
    }

    public function addCustomerProductDeclination(CustomerProductDeclination $customerProductDeclination): self
    {
        if (!$this->customerProductDeclinations->contains($customerProductDeclination)) {
            $this->customerProductDeclinations[] = $customerProductDeclination;
            $customerProductDeclination->setProductDeclination($this);
        }

        return $this;
    }

    public function removeCustomerProductDeclination(CustomerProductDeclination $customerProductDeclination): self
    {
        if ($this->customerProductDeclinations->removeElement($customerProductDeclination)) {
            // set the owning side to null (unless already changed)
            if ($customerProductDeclination->getProductDeclination() === $this) {
                $customerProductDeclination->setProductDeclination(null);
            }
        }

        return $this;
    }
}
