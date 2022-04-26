<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $surname;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    private $address;

    #[ORM\Column(type: 'string', length: 5)]
    private $zip_code;

    #[ORM\Column(type: 'string', length: 255)]
    private $city;

    #[ORM\Column(type: 'string', length: 20)]
    private $phone_number;

    #[ORM\Column(type: 'string', length: 3)]
    private $personal_title;

    #[ORM\Column(type: 'date')]
    private $birthdate;

    #[ORM\ManyToMany(targetEntity: ProductDeclination::class, mappedBy: 'user')]
    private $productDeclinations;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: UserProductDeclination::class, orphanRemoval: true)]
    private $userProductDeclinations;

    public function __construct()
    {
        $this->productDeclinations = new ArrayCollection();
        $this->userProductDeclinations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getPersonalTitle(): ?string
    {
        return $this->personal_title;
    }

    public function setPersonalTitle(string $personal_title): self
    {
        $this->personal_title = $personal_title;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

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
            $productDeclination->addUser($this);
        }

        return $this;
    }

    public function removeProductDeclination(ProductDeclination $productDeclination): self
    {
        if ($this->productDeclinations->removeElement($productDeclination)) {
            $productDeclination->removeUser($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, UserProductDeclination>
     */
    public function getUserProductDeclinations(): Collection
    {
        return $this->userProductDeclinations;
    }

    public function addUserProductDeclination(UserProductDeclination $userProductDeclination): self
    {
        if (!$this->userProductDeclinations->contains($userProductDeclination)) {
            $this->userProductDeclinations[] = $userProductDeclination;
            $userProductDeclination->setUser($this);
        }

        return $this;
    }

    public function removeUserProductDeclination(UserProductDeclination $userProductDeclination): self
    {
        if ($this->userProductDeclinations->removeElement($userProductDeclination)) {
            // set the owning side to null (unless already changed)
            if ($userProductDeclination->getUser() === $this) {
                $userProductDeclination->setUser(null);
            }
        }

        return $this;
    }
}
