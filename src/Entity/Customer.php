<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $address;

    #[ORM\Column(type: 'string', length: 5)]
    private $zip_code;

    #[ORM\Column(type: 'string', length: 255)]
    private $city;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'string', length: 20)]
    private $telephone;

    #[ORM\Column(type: 'string', length: 255)]
    private $password;

    #[ORM\ManyToMany(targetEntity: ProductDeclination::class, mappedBy: 'customer')]
    private $productDeclinations;

    #[ORM\OneToMany(mappedBy: 'customer', targetEntity: CustomerProductDeclination::class, orphanRemoval: true)]
    private $customerProductDeclinations;

    public function __construct()
    {
        $this->productDeclinations = new ArrayCollection();
        $this->customerProductDeclinations = new ArrayCollection();
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zip_code;
    }

    public function setZipCode(string $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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
            $productDeclination->addCustomer($this);
        }

        return $this;
    }

    public function removeProductDeclination(ProductDeclination $productDeclination): self
    {
        if ($this->productDeclinations->removeElement($productDeclination)) {
            $productDeclination->removeCustomer($this);
        }

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
            $customerProductDeclination->setCustomer($this);
        }

        return $this;
    }

    public function removeCustomerProductDeclination(CustomerProductDeclination $customerProductDeclination): self
    {
        if ($this->customerProductDeclinations->removeElement($customerProductDeclination)) {
            // set the owning side to null (unless already changed)
            if ($customerProductDeclination->getCustomer() === $this) {
                $customerProductDeclination->setCustomer(null);
            }
        }

        return $this;
    }
}
