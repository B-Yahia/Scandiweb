<?php

declare(strict_types=1);

namespace Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Service\ServiceContainer;

use function PHPSTORM_META\type;

class QueryType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'product' => [
                    'type' => TypeContainer::product(),
                    'args' => [
                        'id' => ['type' => Type::nonNull(Type::id())],
                    ],
                    'resolve' => function ($root, $args) {
                        $productService = ServiceContainer::product();
                        echo "hey";
                        return $productService->getProductById($args['id']);
                    }
                ],
                'products' => [
                    'type' => Type::listOf(TypeContainer::product()),
                    'args' => [
                        'category' => Type::string(),
                    ],
                    'resolve' => function ($root, $args) {
                        $productService = ServiceContainer::product();
                        if ($args['category'] == 'tech' || $args['category'] == 'clothes') {
                            return $productService->getProductsByCategory($args['category']);
                        } else {
                            return $productService->getAllProducts();
                        }
                    }
                ],
                'getOrder' => [
                    'type' => TypeContainer::order(),
                    'args' => ['id' => Type::id()],
                    'resolve' => function ($root, $args) {
                        $orderService = ServiceContainer::order();
                        return $orderService->getOrderById($args['id']);
                    }
                ],
                'orders' => [
                    'type' => Type::listOf(TypeContainer::order()),
                    'resolve' => function ($root, $args) {
                        $orderService = ServiceContainer::order();
                        return $orderService->getAllOrders();
                    }
                ]
            ]
        ];
        parent::__construct($config);
    }
}
