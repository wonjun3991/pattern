<?php

namespace WonjunChoi\Pattern\Builder;


use Closure;
use WonjunChoi\Pattern\Model\Trade;
use WonjunChoi\Pattern\Model\TradeType;

class TradeBuilder
{
    private Trade $trade;

    public function __construct()
    {
        $this->trade = new Trade();
    }

    public function build(): Trade
    {
        return $this->trade;
    }

    public function type(TradeType $type): void
    {
        $this->trade->setType($type);
    }

    public function quantity(int $quantity): void
    {
        $this->trade->setQuantity($quantity);
    }

    public function price(float $price): void
    {
        $this->trade->setPrice($price);
    }

    public function stock(Closure $closure): void
    {
        $builder = new StockBuilder();
        $closure($builder);
        $this->trade->setStock($builder->build());
    }
}