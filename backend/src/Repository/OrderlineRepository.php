<?php

declare(strict_types=1);

namespace Repository;

class OrderlineRepository extends AbstractRepository
{

    public function saveOrderLine($data)
    {
        return $this->conn->query('INSERT into Orderlines (product_id,units,order_id)values(:product_id,:units,:order_id)', [
            'product_id' => $data['product_id'],
            'units' => $data['units'],
            'order_id' => $data['order_id']
        ])->id();
    }
    public function getOrderlineById($id)
    {
        return $this->conn->query('Select product_id,units from Orderlines where id=:id', ['id' => $id])->find();
    }
    public function getOrderlinesIdsByOrderId($id)
    {
        return $this->conn->query('Select id from Orderlines where order_id=:id', ['id' => $id])->findAllColumn();
    }
    public function getNumberOfUnitsInOrderline($id)
    {
        return $this->conn->query('Select units from Orderlines where id=:id', ['id' => $id])->findColumn();
    }
}
