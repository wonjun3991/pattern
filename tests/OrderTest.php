<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use WonjunChoi\Pattern\Builder\LambdaOrderBuilder;
use WonjunChoi\Pattern\Builder\StockBuilder;
use WonjunChoi\Pattern\Builder\TradeBuilder;
use WonjunChoi\Pattern\Model\Order;
use WonjunChoi\Pattern\Model\Stock;
use WonjunChoi\Pattern\Model\Trade;
use WonjunChoi\Pattern\Model\TradeType;

class OrderTest extends TestCase
{
    public function testTraditional(): void
    {
        $order = new Order();
        $order->setCustomer('BigBank');

        $trade1 = new Trade();
        $trade1->setType(TradeType::BUY);

        $stock1 = new Stock();
        $stock1->setSymbol('IBM');
        $stock1->setMarket('NYSE');

        $trade1->setStock($stock1);
        $trade1->setPrice(125.00);
        $trade1->setQuantity(80);
        $order->addTrade($trade1);

        $trade2 = new Trade();
        $trade2->setType(TradeType::SELL);

        $stock2 = new Stock();
        $stock2->setSymbol('GOOGLE');
        $stock2->setMarket('NASDAQ');

        $trade2->setStock($stock2);
        $trade2->setPrice(375.00);
        $trade2->setQuantity(50);
        $order->addTrade($trade2);

        print($order);
    }

    public function testDsl(): void
    {
        $order = LambdaOrderBuilder::order(static function (LambdaOrderBuilder $builder){
            $builder->forCustomer('BigBank');
            $builder->buy(static function(TradeBuilder $tradeBuilder){
                $tradeBuilder->quantity(80);
                $tradeBuilder->price(125.00);
                $tradeBuilder->stock(static function(StockBuilder $stockBuilder){
                    $stockBuilder->symbol('IBM');
                    $stockBuilder->market('NYSE');
                });
            });
            $builder->sell(static function(TradeBuilder $tradeBuilder){
                $tradeBuilder->quantity(50);
                $tradeBuilder->price(375.00);
                $tradeBuilder->stock(static function(StockBuilder $stockBuilder){
                    $stockBuilder->symbol('GOOGLE');
                    $stockBuilder->market('NASDAQ');
                });
            });
        });
        print($order);
    }
}
