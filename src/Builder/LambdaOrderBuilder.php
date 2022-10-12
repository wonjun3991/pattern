<?php

namespace WonjunChoi\Pattern\Builder;

use Closure;
use WonjunChoi\Pattern\Model\Order;
use WonjunChoi\Pattern\Model\TradeType;

class LambdaOrderBuilder
{
    private Order $order;

    public function __construct()
    {
        $this->order = new Order();
    }


    public static function order(Closure $closure): Order
    {
        $builder = new self();
        $closure($builder);
        return $builder->order;
    }

    public function forCustomer(string $customer): void
    {
        $this->order->setCustomer($customer);
    }

    public function buy(Closure $closure): void
    {
        $this->trade($closure, TradeType::BUY);
    }

    public function sell(Closure $closure): void
    {
        $this->trade($closure, TradeType::SELL);
    }

    private function trade(Closure $closure, TradeType $type): void
    {
        $builder = new TradeBuilder();
        $builder->type($type);
        $closure($builder);
        $this->order->addTrade($builder->build());
    }
}