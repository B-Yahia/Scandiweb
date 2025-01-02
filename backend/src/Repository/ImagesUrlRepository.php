<?php

declare(strict_types=1);

namespace Repository;

class ImagesUrlRepository extends AbstractRepository
{
    public function getProductImages($id): array
    {
        return $this->conn->query('Select url from ImagesUrls where product_id=:id', ['id' => $id])->findAllColumn();
    }
}
