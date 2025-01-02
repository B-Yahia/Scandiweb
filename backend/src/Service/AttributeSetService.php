<?php

declare(strict_types=1);

namespace Service;

use Entities\AttributeSet;
use Entities\SwatchAttributeSet;
use Entities\TextAttributeSet;
use Repository\RepositoryContainer;

class AttributeSetService
{
    private $attributeService;
    private $attributeSetRepo;

    public function __construct()
    {
        $this->attributeService = ServiceContainer::attribute();
        $this->attributeSetRepo = RepositoryContainer::attributeSet();
    }

    public function getAllAttributeSetByProductId($productsId): array
    {
        $ids = $this->attributeSetRepo->getAttributeSetsIdsByProductId($productsId);
        return empty($ids) ? [] : array_map([$this, 'getAttributeSetById'], $ids);
    }

    public function getAttributeSetById($id): AttributeSet
    {
        $attributeSet = $this->attributeSetRepo->getAttributeSetById($id);
        $attributeSet['items'] = $this->attributeService->getAllAttributesByAttributeSetId($attributeSet['id']);
        return $this->createAttributeSetInstance($attributeSet);
    }

    private function createAttributeSetInstance(array $attributeSet): AttributeSet
    {
        switch ($attributeSet['type']) {
            case 'text':
                return new TextAttributeSet($attributeSet);
            case 'swatch':
                return new SwatchAttributeSet($attributeSet);
            default:
                throw new \InvalidArgumentException("Unknown attribute set type: {$attributeSet['type']}");
        }
    }
}
