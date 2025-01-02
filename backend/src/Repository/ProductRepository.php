<?php

declare(strict_types=1);

namespace Repository;

class ProductRepository extends AbstractRepository
{
    public function getAllProductsIds()
    {
        return $this->conn->query('Select id from Products')->findAllColumn();
    }

    public function getProductsIdsByCategory($id)
    {
        return $this->conn->query('Select id from Products where category_id=:id', ['id' => $id])->findAllColumn();
    }

    public function getProductDataById($id)
    {
        return $this->conn->query('Select id,name,brand,description,inStock from Products where id=:id', ['id' => $id])->find();
    }

    public function getProductCategoryId($id)
    {
        return $this->conn->query('Select category_id from Products where id=:id', ['id' => $id])->findColumn();
    }
}
