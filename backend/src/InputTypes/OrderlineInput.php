<?php

declare(strict_types=1);

namespace InputTypes;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;

class OrderlineInput extends InputObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'id' => Type::id(),
                'product' => Type::nonNull(InputTypeContainer::product()),
                'units' => Type::nonNull(Type::int()),
                'selectedAttributes' => Type::listOf(InputTypeContainer::selectedAttribute())
            ],
        ];
        parent::__construct($config);
    }
}
