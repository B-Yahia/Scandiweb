<?php

declare(strict_types=1);

namespace Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

require __DIR__ . "/../../vendor/autoload.php";

class AttributeSetType extends ObjectType
{

    public function __construct()
    {
        $config = [
            'fields' => [
                'id' => Type::nonNull(Type::id()),
                'name' => Type::nonNull(Type::string()),
                'type' => Type::nonNull(Type::string()),
                'items' => Type::listOf(TypeContainer::attribute())
            ]
        ];
        parent::__construct($config);
    }
}
