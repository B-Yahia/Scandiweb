<?php

declare(strict_types=1);

namespace Service;

use Entities\Attribute;
use Repository\RepositoryContainer;

class AttributeService
{
    private $attributeRepo;


    public function __construct()
    {
        $this->attributeRepo = RepositoryContainer::attribute();
    }

    public function getAllAttributesByAttributeSetId($attributeSetId): array
    {
        $ids = $this->attributeRepo->getAttributesIdsByAttributeSetId($attributeSetId);
        return empty($ids) ? [] : array_map([$this, 'getAttributeById'], $ids);
    }

    public function getAttributeById($id): Attribute
    {
        return new Attribute($this->attributeRepo->getAttributeById($id));
    }
}
