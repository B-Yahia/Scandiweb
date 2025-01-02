<?php

declare(strict_types=1);

namespace Entities;

use GraphQL\Utils\Utils;

class Currency
{
    public $id;
    public string $label;
    public string $symbol;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}
