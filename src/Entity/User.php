<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read']],
    denormalizationContext: ['groups' => ['write']],
    collectionOperations: [
        'get' => [
            'path' => '/users',
            'controller' => \App\Controller\GetUsersController::class,
            'method' => 'GET'
        ], 'post'
    ],
    itemOperations: [
        'get' => [
            'path' => '/users/{id}',
            'controller' => \App\Controller\GetUserController::class,
            'method' => 'GET'
        ],
        'delete'
    ],

)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["write"])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["read", "write"])]
    private $surname;

    #[ORM\Column(type: 'string', length: 50)]
    #[Groups(["read", "write"])]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["read", "write"])]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["read", "write"])]
    private $address;

    #[ORM\Column(type: 'string', length: 5)]
    #[Groups(["read", "write"])]
    private $zipCode;

    #[ORM\Column(type: 'string', length: 50)]
    #[Groups(["read", "write"])]
    private $city;

    #[ORM\Column(type: 'string', length: 20)]
    #[Groups(["read", "write"])]
    private $phoneNumber;

    #[ORM\Column(type: 'string', length: 5)]
    #[Groups(["read", "write"])]
    private $personalTitle;

    #[ORM\Column(type: 'date')]
    #[Groups(["read", "write"])]
    private $birthdate;

    #[ORM\ManyToOne(targetEntity: Customer::class, inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups("write")]
    private $customer;

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
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

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
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getPersonalTitle(): ?string
    {
        return $this->personalTitle;
    }

    public function setPersonalTitle(string $personalTitle): self
    {
        $this->personalTitle = $personalTitle;

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
