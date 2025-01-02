<?php

declare(strict_types=1);

namespace Entities;

use GraphQL\Utils\Utils;

class Order
{
    public $id;
    public array $orderlines;
    public float $total;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}
