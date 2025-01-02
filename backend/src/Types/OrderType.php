<?php

declare(strict_types=1);

namespace Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

require __DIR__ . "/../../vendor/autoload.php";

class OrderType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'id' => Type::id(),
                'orderlines' => Type::listOf(TypeContainer::orderline()),
                'total' => Type::nonNull(Type::float())
            ]
        ];
        parent::__construct($config);
    }
}
