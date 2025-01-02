<?php

declare(strict_types=1);

namespace Entities;

use Entities\AttributeSet;

class TextAttributeSet extends AttributeSet
{
    protected function setType(): void
    {
        $this->type = 'text';
    }
}
