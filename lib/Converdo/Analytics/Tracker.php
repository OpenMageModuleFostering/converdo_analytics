<?php

class Converdo_Analytics_Tracker
{
    /**
     * @var Converdo_Analytics_Models_Configuration
     */
    protected static $configuration;

    /**
     * @var Converdo_Analytics_Models_EcommerceView
     */
    protected static $ecommerceView;

    /**
     * @var Converdo_Analytics_Models_CategoryView
     */
    protected static $categoryView;

    /**
     * @var Converdo_Analytics_Models_PageView
     */
    protected static $pageView;

    /**
     * @var Converdo_Analytics_Models_SearchView
     */
    protected static $searchView;

    /**
     * @var Converdo_Analytics_Models_EcommerceCartUpdate
     */
    protected static $ecommerceCartUpdate;

    /**
     * @var array
     */
    protected static $ecommerceProducts = [];

    /**
     * @var Converdo_Analytics_Models_EcommerceOrder
     */
    protected static $ecommerceOrder;

    /**
     * @var array
     */
    protected static $query = [];

    /**
     * @var Converdo_Analytics_Models_EcommerceProduct[]
     */
    protected static $attributes = [];

    protected static $collected = [];
    
    /**
     * Retrieves the Converdo Analytics Tracker Configuration.
     *
     * @return Converdo_Analytics_Models_Configuration
     */
    public static function configuration()
    {
        if (! self::$configuration) {
            self::$configuration = new Converdo_Analytics_Models_Configuration();
        }

        return self::$configuration;
    }

    /**
     * Manages the Ecommerce View.
     *
     * @return Converdo_Analytics_Models_EcommerceView
     */
    public static function ecommerceView()
    {
        if (! self::$ecommerceView) {
            self::$ecommerceView = new Converdo_Analytics_Models_EcommerceView();
        }

        return self::$ecommerceView;
    }

    /**
     * Manages the Category View.
     *
     * @return Converdo_Analytics_Models_CategoryView
     */
    public static function categoryView()
    {
        if (! self::$categoryView) {
            self::$categoryView = new Converdo_Analytics_Models_CategoryView();
        }

        return self::$categoryView;
    }

    /**
     * Manages the Page View.
     *
     * @return Converdo_Analytics_Models_PageView
     */
    public static function pageView()
    {
        if (! self::$pageView) {
            self::$pageView = new Converdo_Analytics_Models_PageView();
        }

        return self::$pageView;
    }

    /**
     * Manages the Search View.
     *
     * @return Converdo_Analytics_Models_SearchView
     */
    public static function searchView()
    {
        if (! self::$searchView) {
            self::$searchView = new Converdo_Analytics_Models_SearchView();
        }

        return self::$searchView;
    }

    /**
     * Manages the Ecommerce Product.
     *
     * @return Converdo_Analytics_Models_EcommerceProduct
     */
    public static function ecommerceProduct()
    {
        return new Converdo_Analytics_Models_EcommerceProduct();
    }

    /**
     * Manages the Ecommerce Cart.
     *
     * @return Converdo_Analytics_Models_EcommerceCartUpdate
     */
    public static function ecommerceCartUpdate()
    {
        if (! self::$ecommerceCartUpdate) {
            self::$ecommerceCartUpdate = new Converdo_Analytics_Models_EcommerceCartUpdate();
        }

        return self::$ecommerceCartUpdate;
    }

    /**
     * Manages the Ecommerce Order.
     *
     * @return Converdo_Analytics_Models_EcommerceOrder
     */
    public static function ecommerceOrder()
    {
        if (! self::$ecommerceOrder) {
            self::$ecommerceOrder = new Converdo_Analytics_Models_EcommerceOrder();
        }

        return self::$ecommerceOrder;
    }


    /**
     * @param  array                                        $collected
     * @return Converdo_Analytics_Support_AbstractTracker[]
     */
    public static function query(array $collected = [])
    {
        if (count($collected)) {
            self::$query = array_merge(self::$query, $collected);
            return null;
        }

        return self::$query;
    }

    public static function attributes($attributes = null)
    {
        if (! $attributes) {
            return self::$attributes;
        }

        self::$attributes = (array) $attributes + self::$attributes;

        return self::$attributes;
    }

    public static function collect(array $data)
    {
        self::$collected = $data + self::$collected;
    }

    public static function parse()
    {
        return self::$collected;
    }
}