<?php

namespace WonjunChoi\Pattern\Model;

use Stringable;

class Trade implements Stringable
{
    private TradeType $type;
    private Stock $stock;
    private int $quantity;
    private float $price;

    public function getType(): TradeType
    {
        return $this->type;
    }

    public function setType(TradeType $type): void
    {
        $this->type = $type;
    }

    public function getStock(): Stock
    {
        return $this->stock;
    }

    public function setStock(Stock $stock): void
    {
        $this->stock = $stock;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getValue(): float
    {
        return $this->quantity * $this->price;
    }


    public function __toString()
    {
        return "Trade{ type = {$this->getType()->name}, stock = {$this->getStock()}, quantity = {$this->getQuantity()}, price = {$this->getPrice()}}";
    }
}
