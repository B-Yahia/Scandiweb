<?php

declare(strict_types=1);

namespace Types;

use GraphQL\Type\Definition\ObjectType;
use InputTypes\InputTypeContainer;
use Service\ServiceContainer;

class MutationType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'addOrder' => [
                    'type' => TypeContainer::order(),
                    'args' => [
                        'order' => ['type' => InputTypeContainer::order()],
                    ],
                    'resolve' => function ($root, $args) {
                        $orderService = ServiceContainer::order();
                        $id = $orderService->saveOrder($args['order']);
                        return $orderService->getOrderById($id);
                    }
                ]
            ],
        ];
        parent::__construct($config);
    }
}
