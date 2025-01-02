<?php

declare(strict_types=1);

namespace Service;

use Entities\Order;
use Repository\RepositoryContainer;

class OrderService
{
    private $orderRepo;
    private $orderlineService;
    public function __construct()
    {
        $this->orderRepo = RepositoryContainer::order();
        $this->orderlineService = ServiceContainer::orderline();
    }
    public function saveOrder($data)
    {
        $id = $this->orderRepo->saveOrder($data['total']);
        foreach ($data['orderlines'] as $orderline) {
            $this->orderlineService->saveOrderline(
                [
                    'order_id' => $id,
                    'orderline' => $orderline,
                ]
            );
        }
        return $id;
    }

    public function getOrderById($id): Order
    {
        $total = $this->orderRepo->getOrderTotal($id);
        $listOfOrderLines = $this->orderlineService->getOrderlinesByOrderId($id);
        return new Order([
            'id' => $id,
            'total' => floatval($total),
            'orderlines' => $listOfOrderLines,
        ]);
    }

    public function getAllOrders(): array
    {
        $ids = $this->orderRepo->getOrdersIds();
        return empty($ids) ? [] : array_map([$this, 'getOrderById'], $ids);
    }
}
