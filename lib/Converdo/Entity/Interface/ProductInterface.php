<?php

interface Converdo_Entity_Interface_ProductInterface
{
    /**
     * Get the product id.
     *
     * @return int
     */
    public function getId();

    /**
     * Get the parent product id.
     *
     * @return int
     */
    public function getParentId();

    /**
     * Get the children product id.
     *
     * @return int
     */
    public function getChildrenId();

    /**
     * Get the product name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the product SKU.
     *
     * @return string
     */
    public function getSku();

    /**
     * Get the product price.
     *
     * @return float
     */
    public function getPrice();

    /**
     * Get the product status.
     *
     * @return bool
     */
    public function getStatus();

    /**
     * Get the product image url.
     *
     * @return string
     */
    public function getImageUrl();

    /**
     * Get whether the product is in stock.
     *
     * @return bool
     */
    public function isInStock();

    /**
     * Get the product's brand.
     *
     * @return bool
     */
    public function getBrand();

    /**
     * Get the product stock amount.
     *
     * @return int
     */
    public function getStockQuantity();

    /**
     * Get the ordered quantity amount.
     *
     * @return float
     */
    public function getQuantityOrdered();

    /**
     * Get the quantity amount.
     *
     * @return float
     */
    public function getQuantity();

    /**
     * Get the product type.
     *
     * @return int
     */
    public function getType();

    /**
     * Get the visibilities of the product.
     *
     * @return array
     */
    public function getVisibilities();

    /**
     * Get the current category of the product.
     *
     * @return Mage_Catalog_Model_Category
     */
    public function getCategory();

    /**
     * Get the current category tree of the product.
     *
     * @return Varien_Data_Collection
     */
    public function getCategories();

    /**
     * Get the ids of the category tree of the product.
     *
     * @return array
     */
    public function getCategoryIds();

    /**
     * Get the attributes of the product.
     *
     * @return array
     */
    public function getAttributes();
}