<?php

declare(strict_types=1);

namespace Entities;

use Entities\AttributeSet;

class SwatchAttributeSet extends AttributeSet
{
    protected function setType()
    {
        $this->type = 'swatch';
    }
}
