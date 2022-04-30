<?php

namespace App\Entity;

use App\Repository\PurchaseItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PurchaseItemRepository::class)]
class PurchaseItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: supplement::class, inversedBy: 'purchaseItems')]
    private $supplement;

    #[ORM\ManyToOne(targetEntity: Purchase::class, inversedBy: 'purchaseItems')]
    #[ORM\JoinColumn(nullable: false)]
    private $purchase;

    #[ORM\Column(type: 'string', length: 255)]
    private $supplementName;

    #[ORM\Column(type: 'integer')]
    private $supplementPrice;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\Column(type: 'integer')]
    private $total;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getsupplement(): ?supplement
    {
        return $this->supplement;
    }

    public function setsupplement(?supplement $supplement): self
    {
        $this->supplement = $supplement;

        return $this;
    }

    public function getPurchase(): ?Purchase
    {
        return $this->purchase;
    }

    public function setPurchase(?Purchase $purchase): self
    {
        $this->purchase = $purchase;

        return $this;
    }

    public function getsupplementName(): ?string
    {
        return $this->supplementName;
    }

    public function setsupplementName(string $supplementName): self
    {
        $this->supplementName = $supplementName;

        return $this;
    }

    public function getsupplementPrice(): ?int
    {
        return $this->supplementPrice;
    }

    public function setsupplementPrice(int $supplementPrice): self
    {
        $this->supplementPrice = $supplementPrice;

        return $this;
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

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }
}
