<?php

namespace WonjunChoi\Pattern\Model;

use Stringable;

class Stock implements Stringable
{
    private string $symbol;
    private string $market;

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    public function getMarket(): string
    {
        return $this->market;
    }

    public function setMarket(string $market): void
    {
        $this->market = $market;
    }

    public function __toString()
    {
        return "Stock{ symbol = {$this->getSymbol()}, market = {$this->getMarket()}}";
    }
}