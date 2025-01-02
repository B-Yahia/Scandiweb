<?php

declare(strict_types=1);

namespace InputTypes;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;

class PriceInput extends InputObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'id' => Type::nonNull(Type::id()),
                'amount' => Type::float(),
                'currency' => Type::nonNull(InputTypeContainer::currency())
            ],
        ];
        parent::__construct($config);
    }
}
