<?php

declare(strict_types=1);

namespace Types;

final class TypeContainer
{
    private static $price;
    private static $currency;
    private static $attribute;
    private static $attributeSet;
    private static $product;
    private static $orderline;
    private static $selectedAttributes;
    private static $order;
    private static $query;
    private static $mutation;

    public static function price(): PriceType
    {
        return self::$price ?: (self::$price = new PriceType());
    }

    public static function currency(): CurrencyType
    {
        return self::$currency ?: (self::$currency = new CurrencyType());
    }

    public static function attribute(): AttributeType
    {
        return self::$attribute ?: (self::$attribute = new AttributeType());
    }

    public static function attributeSet(): AttributeSetType
    {
        return self::$attributeSet ?: (self::$attributeSet = new AttributeSetType());
    }

    public static function product(): ProductType
    {
        return self::$product ?: (self::$product = new ProductType());
    }

    public static function orderline(): OrderlineType
    {
        return self::$orderline ?: (self::$orderline = new OrderlineType());
    }

    public static function selectedAttributes(): SelectedAttributeType
    {
        return self::$selectedAttributes ?: (self::$selectedAttributes = new SelectedAttributeType());
    }

    public static function query()
    {
        return self::$query ?: (self::$query = new QueryType());
    }

    public static function mutation()
    {
        return self::$mutation ?: (self::$mutation = new MutationType());
    }
    public static function order(): OrderType
    {
        return self::$order ?: (self::$order = new OrderType());
    }
}
