<?php

declare(strict_types=1);

namespace Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

require __DIR__ . "/../../vendor/autoload.php";

class ProductType extends ObjectType
{

    public function __construct()
    {
        $config = [
            'fields' => [
                'id' => Type::nonNull(type::id()),
                'inStock' => Type::nonNull(Type::boolean()),
                'name' => Type::nonNull(Type::string()),
                'gallery' => Type::listOf(Type::string()),
                'description' => Type::string(),
                'category' => Type::nonNull(Type::string()),
                'attributes' => Type::listOf(TypeContainer::attributeSet()),
                'prices' => Type::listOf(TypeContainer::price()),
                'brand' => Type::string()
            ],
        ];
        parent::__construct($config);
    }
}
