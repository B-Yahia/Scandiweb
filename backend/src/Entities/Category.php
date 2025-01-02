<?php

declare(strict_types=1);

namespace Entities;

use GraphQL\Utils\Utils;

class Category
{
    public $id;
    public string $name;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}
