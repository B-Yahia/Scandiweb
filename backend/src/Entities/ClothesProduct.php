<?php

declare(strict_types=1);

namespace Entities;

class ClothesProduct extends Product
{
    protected function setCategory()
    {
        $this->category = "clothes";
    }
}
