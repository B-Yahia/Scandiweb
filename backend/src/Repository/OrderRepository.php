<?php

declare(strict_types=1);

namespace Repository;

class OrderRepository extends AbstractRepository
{
    public function saveOrder($amount)
    {
        return $this->conn->query('Insert into Orders (total) values (:total)', ['total' => $amount])->id();
    }

    public function getOrderTotal($id)
    {
        return $this->conn->query('SELECT total from Orders where id=:id', ['id' => $id])->findColumn();
    }
    public function getOrdersIds()
    {
        return $this->conn->query('SELECT id FROM Orders')->findAllColumn();
    }
}
