<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $category_name = null;

    #[ORM\Column(length: 255)]
    private ?string $sku = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $shortdesc = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 4)]
    private ?string $price = null;

    #[ORM\Column(length: 255)]
    private ?string $link = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column]
    private ?int $rating = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $caffeineType = null;

    #[ORM\Column(nullable: true)]
    private ?int $count = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Flavored = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Seasonal = null;

    #[ORM\Column]
    private ?bool $InStock = null;

    #[ORM\Column]
    private ?int $Facebook = null;

    #[ORM\Column]
    private ?int $IsKCup = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    public function setCategoryName(string $category_name): static
    {
        $this->category_name = $category_name;

        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): static
    {
        $this->sku = $sku;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getShortdesc(): ?string
    {
        return $this->shortdesc;
    }

    public function setShortdesc(string $shortdesc): static
    {
        $this->shortdesc = $shortdesc;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): static
    {
        $this->link = $link;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getCaffeineType(): ?string
    {
        return $this->caffeineType;
    }

    public function setCaffeineType(?string $caffeineType): static
    {
        $this->caffeineType = $caffeineType;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): static
    {
        $this->count = $count;

        return $this;
    }

    public function isFlavored(): ?bool
    {
        return $this->Flavored;
    }

    public function setFlavored(?bool $Flavored): static
    {
        $this->Flavored = $Flavored;

        return $this;
    }

    public function isSeasonal(): ?bool
    {
        return $this->Seasonal;
    }

    public function setSeasonal(?bool $Seasonal): static
    {
        $this->Seasonal = $Seasonal;

        return $this;
    }

    public function isInStock(): ?bool
    {
        return $this->InStock;
    }

    public function setInStock(bool $InStock): static
    {
        $this->InStock = $InStock;

        return $this;
    }

    public function getFacebook(): ?int
    {
        return $this->Facebook;
    }

    public function setFacebook(int $Facebook): static
    {
        $this->Facebook = $Facebook;

        return $this;
    }

    public function getIsKCup(): ?int
    {
        return $this->IsKCup;
    }

    public function setIsKCup(int $IsKCup): static
    {
        $this->IsKCup = $IsKCup;

        return $this;
    }
}
