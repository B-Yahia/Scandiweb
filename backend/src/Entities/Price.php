<?php

declare(strict_types=1);

namespace Entities;

use GraphQL\Utils\Utils;

class Price
{
    public $id;
    public float $amount;
    public Currency $currency;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}
