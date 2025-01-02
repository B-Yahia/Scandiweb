<?php

declare(strict_types=1);

namespace Service;

use Entities\SelectedAttributes;
use Repository\RepositoryContainer;

class SelectedAttributeService
{
    private $selectedAttributeRepo;
    private $attributeService;
    private $attributeSetService;
    public function __construct()
    {
        $this->selectedAttributeRepo = RepositoryContainer::selectedAttribute();
        $this->attributeService = ServiceContainer::attribute();
        $this->attributeSetService = ServiceContainer::attributeSet();
    }

    public function saveSelectedAttribute($data)
    {
        $this->selectedAttributeRepo->saveSelectedAttribute($data);
    }

    public function getSelectedAttributeByAttributeAndAttributeSetIDS($data): SelectedAttributes
    {
        $attribute = $this->attributeService->getAttributeById($data['attribute_id']);
        $attributeSet = $this->attributeSetService->getAttributeSetById($data['attribute_set_id']);
        return new SelectedAttributes([
            "attribute" => $attribute,
            "attributeSet" => $attributeSet
        ]);
    }
    public function getAllSelectedAttributesByOrderlineId($id): array
    {
        $selectedAttributesData = $this->selectedAttributeRepo->getAllSelectedAttributeByOrderlineId($id);
        return array_map(function ($item) {
            return $this->getSelectedAttributeByAttributeAndAttributeSetIDS([
                'attribute_id' => $item['attribute_id'],
                'attribute_set_id' => $item['attribute_set_id'],
            ]);
        }, $selectedAttributesData);;
    }
}
