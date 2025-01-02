<?php

declare(strict_types=1);

namespace Service;

use Entities\OrderLine;
use Repository\RepositoryContainer;

class OrderlineService
{
    private $orderlineRepo;
    private $selectedAttributeService;
    private $productService;
    public function __construct()
    {
        $this->orderlineRepo = RepositoryContainer::orderline();
        $this->selectedAttributeService = ServiceContainer::selectedAttributes();
        $this->productService = ServiceContainer::product();
    }
    public function saveOrderline($data)
    {
        $id = $this->orderlineRepo->saveOrderLine([
            'order_id' => $data['order_id'],
            'units' => $data['orderline']['units'],
            'product_id' => $data['orderline']['product']['id']
        ]);
        foreach ($data['orderline']['selectedAttributes'] as $selectedAttribute) {
            $this->selectedAttributeService->saveSelectedAttribute([
                'orderline_id' => $id,
                'attribute_set_id' => $selectedAttribute['attributeSet']['id'],
                'attribute_id' => $selectedAttribute['attribute']['id']
            ]);
        }
    }

    public function getOrderlineById($id)
    {
        $orderlineData = $this->orderlineRepo->getOrderlineById($id);
        $product = $this->productService->getProductById($orderlineData['product_id']);
        $listOfSelectedAttributes = $this->selectedAttributeService->getAllSelectedAttributesByOrderlineId($id);
        return new OrderLine([
            'id' => $id,
            'units' => $orderlineData['units'],
            'product' => $product,
            'selectedAttributes' => $listOfSelectedAttributes
        ]);
    }

    public function getOrderlinesByOrderId($id): array
    {
        $ids = $this->orderlineRepo->getOrderlinesIdsByOrderId($id);
        return empty($ids) ? [] : array_map([$this, 'getOrderlineById'], $ids);
    }
}
