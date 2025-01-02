<?php

declare(strict_types=1);

namespace Entities;

use GraphQL\Utils\Utils;

class SelectedAttributes
{
    public AttributeSet $attributeSet;
    public Attribute $attribute;
    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}
