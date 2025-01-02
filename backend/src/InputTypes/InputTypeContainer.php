<?php

declare(strict_types=1);

namespace InputTypes;

class InputTypeContainer
{
    private static $attributeInputType;
    private static $attributeSetInputType;
    private static $currencyInpuType;
    private static $priceInputType;
    private static $productInputType;
    private static $orderlineInputType;
    private static $orderInputType;
    private static $selectedAttributeInputType;

    public static function attribute()
    {
        return self::$attributeInputType ?: (self::$attributeInputType = new AttributeInput());
    }
    public static function attributeSet()
    {
        return self::$attributeSetInputType ?: (self::$attributeSetInputType = new AttributeSetInput());
    }
    public static function currency()
    {
        return self::$currencyInpuType ?: (self::$currencyInpuType = new CurrencyInput());
    }
    public static function price()
    {
        return self::$priceInputType ?: (self::$priceInputType = new PriceInput());
    }
    public static function product()
    {
        return self::$productInputType ?: (self::$productInputType = new ProductInput());
    }
    public static function order()
    {
        return self::$orderInputType ?: (self::$orderInputType = new OrderInput());
    }
    public static function orderline()
    {
        return self::$orderlineInputType ?: (self::$orderlineInputType = new OrderlineInput());
    }
    public static function selectedAttribute()
    {
        return self::$selectedAttributeInputType ?: (self::$selectedAttributeInputType = new SelectedAttributeInput());
    }
}
