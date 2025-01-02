<?php

declare(strict_types=1);

namespace InputTypes;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;

class AttributeSetInput extends InputObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'id' => Type::nonNull(Type::id()),
                'name' => Type::string(),
                'type' => Type::string(),
                'items' => Type::listOf(InputTypeContainer::attribute())
            ],
        ];
        parent::__construct($config);
    }
}
