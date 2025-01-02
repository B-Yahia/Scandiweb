<?php

declare(strict_types=1);

namespace Repository;

class SelectedAttributeRepository extends AbstractRepository
{
    public function saveSelectedAttribute($data)
    {
        $this->conn->query('INSERT into SelectedAttributes (orderline_id ,attribute_id ,attribute_set_id ) values (:orderline_id ,:attribute_id ,:attribute_set_id )', [
            'orderline_id' => $data['orderline_id'],
            'attribute_id' => $data['attribute_id'],
            'attribute_set_id' => $data['attribute_set_id'],
        ]);
    }

    public function getAllSelectedAttributeByOrderlineId($id): array
    {
        return $this->conn->query('Select attribute_id ,attribute_set_id from SelectedAttributes where orderline_id=:id', ['id' => $id])->findAll();
    }
}
