<?php

declare(strict_types=1);

namespace Repository;

class PriceRepository extends AbstractRepository
{
    public function getProductPricesIds($id): array
    {
        return $this->conn->query('select id from Prices where product_id=:id', ['id' => $id])->findAllColumn();
    }

    public function getPriceById($id): array
    {
        return $this->conn->query('select id,amount from Prices where id=:id', ['id' => $id])->find();
    }

    public function getPriceCurrencyId($id): int
    {
        return $this->conn->query('select currency_id from Prices where id=:id', ['id' => $id])->findColumn();
    }
}
