<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CustomerProductDeclinationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerProductDeclinationRepository::class)]
#[ApiResource]
class CustomerProductDeclination
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $stock;

    #[ORM\ManyToOne(targetEntity: ProductDeclination::class, inversedBy: 'customerProductDeclinations')]
    #[ORM\JoinColumn(nullable: false)]
    private $product_declination;

    #[ORM\ManyToOne(targetEntity: Customer::class, inversedBy: 'customerProductDeclinations')]
    #[ORM\JoinColumn(nullable: false)]
    private $customer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getProductDeclination(): ?ProductDeclination
    {
        return $this->product_declination;
    }

    public function setProductDeclination(?ProductDeclination $product_declination): self
    {
        $this->product_declination = $product_declination;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
