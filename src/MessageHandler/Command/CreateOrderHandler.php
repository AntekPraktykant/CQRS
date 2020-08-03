<?php

namespace App\MessageHandler\Command;


use App\Message\Command\CreateOrder;

class CreateOrderHandler
{
    public function __invoke(CreateOrder $createOrder)
    {
        // do stuff

        sleep(10);
        var_dump($createOrder);
    }
}