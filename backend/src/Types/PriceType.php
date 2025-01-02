<?php

declare(strict_types=1);

namespace Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

require __DIR__ . "/../../vendor/autoload.php";

class PriceType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'id' => Type::nonNull(Type::id()),
                'amount' => Type::nonNull(Type::float()),
                'currency' => TypeContainer::currency()
            ],
        ];
        parent::__construct($config);
    }
}
