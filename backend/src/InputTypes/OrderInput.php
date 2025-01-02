<?php

declare(strict_types=1);

namespace InputTypes;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;

class OrderInput extends InputObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'total' => Type::nonNull(Type::float()),
                'orderlines' => Type::listOf(InputTypeContainer::orderline())
            ],
        ];
        parent::__construct($config);
    }
}
