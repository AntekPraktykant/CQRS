<?php

namespace App\Message\Command;


class CreateOrder
{
    private $productId;
    private $amount;

    /**
     * CreateOrder constructor.
     * @param $productId
     * @param $amount
     */
    public function __construct(int $productId, int $amount)
    {
        $this->productId = $productId;
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @return mixed
     */
    public function getAmount(): int
    {
        return $this->amount;
    }



}