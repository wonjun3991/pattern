<?php

namespace WonjunChoi\Pattern\Model;

class Order implements \Stringable
{
    private string $customer;
    private array $trades = [];

    public function addTrade(Trade $trade): void
    {
        $this->trades[] = $trade;
    }

    public function getCustomer(): string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): void
    {
        $this->customer = $customer;
    }

    public function getValue(): float|int
    {
        return array_sum(array_map(static fn($trade) => $trade->getValue(), $this->trades));
    }

    public function __toString()
    {
        $trades = implode(',', $this->trades);
        return "Order{ customer = {$this->customer}, trades = {$trades}}";
    }
}
