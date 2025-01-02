<?php

declare(strict_types=1);

namespace Entities;

use GraphQL\Utils\Utils;

class Attribute
{
    public $id;
    public string $displayValue;
    public string $value;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}
