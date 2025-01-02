<?php

declare(strict_types=1);

namespace Repository;


class RepositoryContainer
{
    private static $attributeRepository;
    private static $attributeSetRepository;
    private static $categoryRepository;
    private static $currencyRepository;
    private static $imagesUrlRepository;
    private static $priceRepository;
    private static $productRepository;
    private static $orderRepository;
    private static $orderlineRepository;
    private static $selectedAttributeRepository;


    public static function attribute(): AttributeRepository
    {
        return self::$attributeRepository ?: (self::$attributeRepository = new AttributeRepository());
    }
    public static function attributeSet(): AttributeSetRepository
    {
        return self::$attributeSetRepository ?: (self::$attributeSetRepository = new AttributeSetRepository());
    }
    public static function category(): CategoryRepository
    {
        return self::$categoryRepository ?: (self::$categoryRepository = new CategoryRepository());
    }
    public static function currency(): CurrencyRepository
    {
        return self::$currencyRepository ?: (self::$currencyRepository = new CurrencyRepository());
    }
    public static function imageUrl(): ImagesUrlRepository
    {
        return self::$imagesUrlRepository ?: (self::$imagesUrlRepository = new ImagesUrlRepository());
    }
    public static function price(): PriceRepository
    {
        return self::$priceRepository ?: (self::$priceRepository = new PriceRepository());
    }
    public static function product(): ProductRepository
    {
        return self::$productRepository ?: (self::$productRepository = new ProductRepository());
    }
    public static function order(): OrderRepository
    {
        return self::$orderRepository ?: (self::$orderRepository = new OrderRepository());
    }
    public static function orderline(): OrderlineRepository
    {
        return self::$orderlineRepository ?: (self::$orderlineRepository = new OrderlineRepository());
    }
    public static function selectedAttribute(): SelectedAttributeRepository
    {
        return self::$selectedAttributeRepository ?: (self::$selectedAttributeRepository = new SelectedAttributeRepository());
    }
}
