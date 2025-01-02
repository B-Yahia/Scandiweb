<?php

declare(strict_types=1);

namespace Service;

class ServiceContainer
{
    private static $attributeService;
    private static $attributeSetService;
    private static $currencyService;
    private static $priceService;
    private static $productService;
    private static $orderService;
    private static $orderlineService;
    private static $selectedAttributes;

    public static function attribute(): AttributeService
    {
        return self::$attributeService ?: (self::$attributeService = new AttributeService());
    }
    public static function attributeSet(): AttributeSetService
    {
        return self::$attributeSetService ?: (self::$attributeSetService = new AttributeSetService());
    }
    public static function currency(): CurrencyService
    {
        return self::$currencyService ?: (self::$currencyService = new CurrencyService());
    }
    public static function price(): PriceService
    {
        return self::$priceService ?: (self::$priceService = new PriceService());
    }
    public static function product(): ProductService
    {
        return self::$productService ?: (self::$productService = new ProductService());
    }
    public static function order(): OrderService
    {
        return self::$orderService ?: (self::$orderService = new OrderService());
    }
    public static function orderline(): OrderlineService
    {
        return self::$orderlineService ?: (self::$orderlineService = new OrderlineService());
    }
    public static function selectedAttributes(): SelectedAttributeService
    {
        return self::$selectedAttributes ?: (self::$selectedAttributes = new SelectedAttributeService());
    }
}
