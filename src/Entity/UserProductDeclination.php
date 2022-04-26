<?php

namespace App\Entity;

use App\Repository\UserProductDeclinationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserProductDeclinationRepository::class)]
class UserProductDeclination
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\ManyToOne(targetEntity: ProductDeclination::class, inversedBy: 'userProductDeclinations')]
    #[ORM\JoinColumn(nullable: false)]
    private $product_declination;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'userProductDeclinations')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
