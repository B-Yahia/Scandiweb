<?php

declare(strict_types=1);

namespace InputTypes;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;

class SelectedAttributeInput extends InputObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'attributeSet' => Type::nonNull(InputTypeContainer::attributeSet()),
                'attribute' => Type::nonNull(InputTypeContainer::attribute())
            ],
        ];
        parent::__construct($config);
    }
}
