<?php

namespace WonjunChoi\Pattern\Builder;

use JetBrains\PhpStorm\Pure;
use WonjunChoi\Pattern\Model\Stock;

class StockBuilder
{
    private Stock $stock;

    #[Pure] public function __construct()
    {
        $this->stock = new Stock();
    }

    public function build(): Stock
    {
        return $this->stock;
    }

    public function symbol(string $symbol): void
    {
        $this->stock->setSymbol($symbol);
    }

    public function market(string $market): void
    {
        $this->stock->setMarket($market);
    }
}