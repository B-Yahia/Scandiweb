<?php

declare(strict_types=1);

namespace Repository;

class AttributeRepository extends AbstractRepository
{

    public function getAttributeById($id)
    {
        return $this->conn->query('Select id,value,displayValue from Attributes where id=:id', ['id' => $id])->find();
    }

    public function getAttributesIdsByAttributeSetId($id): array
    {
        return $this->conn->query('select id from Attributes where attribute_set_id=:id', ['id' => $id])->findAllColumn();
    }
}
