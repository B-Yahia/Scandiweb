<?php

declare(strict_types=1);

namespace Repository;

class CurrencyRepository extends AbstractRepository
{
    public function getCurrencyId($id): array
    {
        return $this->conn->query('select id,label,symbol from Currencies where id=:id', ['id' => $id])->find();
    }
}
