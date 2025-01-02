<?php

declare(strict_types=1);

namespace Repository;

class AttributeSetRepository extends AbstractRepository
{
    public function getAttributeSetsIdsByProductId($id)
    {
        return $this->conn->query('select id from AttributeSets where product_id=:id', ['id' => $id])->findAllColumn();
    }

    public function getAttributeSetById($id)
    {
        return $this->conn->query('Select id ,name,type from AttributeSets where id=:id', ['id' => $id])->find();
    }
}
