<?php

declare(strict_types=1);

namespace Entities;

use GraphQL\Utils\Utils;

abstract class Product
{
    public $id;
    public string $name;
    public $inStock;
    public array $gallery;
    public string $description;
    public string $category;
    public array $attributes;
    public array $prices;
    public string $brand;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
        $this->setCategory();
    }

    abstract protected function setCategory();
}
