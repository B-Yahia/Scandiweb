<?php

declare(strict_types=1);

namespace Entities;

use GraphQL\Utils\Utils;

class OrderLine
{
    public $id;
    public Product $product;
    public int $units;
    public array $selectedAttributes;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}
