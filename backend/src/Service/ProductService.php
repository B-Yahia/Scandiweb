<?php

declare(strict_types=1);

namespace Service;

use Entities\ClothesProduct;
use Entities\Product;
use Entities\TechProduct;
use Repository\RepositoryContainer;

class ProductService
{
    private $priceService;
    private $attributeSetService;
    private $imagesUrlRepo;
    private $productRepo;
    private $categoryRepo;

    public function __construct()
    {
        $this->priceService = ServiceContainer::price();
        $this->attributeSetService = ServiceContainer::attributeSet();
        $this->imagesUrlRepo = RepositoryContainer::imageUrl();
        $this->productRepo = RepositoryContainer::product();
        $this->categoryRepo = RepositoryContainer::category();
    }

    public function getProductById($id): Product
    {
        $productData = $this->productRepo->getProductDataById($id);
        $productData['category'] = $this->categoryRepo->getCategoryNameById($this->productRepo->getProductCategoryId($id));
        $productData['prices'] = $this->priceService->getAllPricesByProductID($id);
        $productData['gallery'] = $this->imagesUrlRepo->getProductImages($id);
        $productData['attributes'] = $this->attributeSetService->getAllAttributeSetByProductId($id);
        return $this->createProductInstance($productData);
    }

    private function createProductInstance(array $productData): Product
    {
        switch ($productData['category']) {
            case 'tech':
                return new TechProduct($productData);
            case 'clothes':
                return new ClothesProduct($productData);
            default:
                throw new \InvalidArgumentException("Unknown product category: {$productData['category']}");
        }
    }

    public function getAllProducts()
    {
        $ids = $this->productRepo->getAllProductsIds();
        return empty($ids) ? [] : array_map([$this, 'getProductById'], $ids);
    }

    public function getProductsByCategory(string $category)
    {
        $category_id = $this->categoryRepo->getCategoryIdByName($category);
        $ids = $this->productRepo->getProductsIdsByCategory($category_id);
        return empty($ids) ? [] : array_map([$this, 'getProductById'], $ids);
    }
}
