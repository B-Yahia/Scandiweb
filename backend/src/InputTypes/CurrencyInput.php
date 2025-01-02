<?php

declare(strict_types=1);

namespace InputTypes;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;

class CurrencyInput extends InputObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'id' => Type::nonNull(Type::id()),
                'symbol' => Type::string(),
                'label' => Type::string()
            ],
        ];
        parent::__construct($config);
    }
}
