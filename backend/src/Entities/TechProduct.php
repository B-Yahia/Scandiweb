<?php

declare(strict_types=1);

namespace Entities;

class TechProduct extends Product
{
    protected function setCategory()
    {
        $this->category = "tech";
    }
}
