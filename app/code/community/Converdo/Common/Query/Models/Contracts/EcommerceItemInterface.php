<?php

namespace Converdo\Common\Query\Models\Contracts;

interface EcommerceItemInterface
{
    /**
     * Sets the product id.
     *
     * @param  int          $id
     * @return $this
     */
    public function setId($id);

    /**
     * Gets the product id.
     *
     * @return int
     */
    public function getId();

    /**
     * Sets the product SKU.
     *
     * @param  string       $sku
     * @return $this
     */
    public function setSKU($sku);

    /**
     * Gets the product SKU.
     *
     * @return string
     */
    public function getSKU();

    /**
     * Sets the product name.
     *
     * @param  string       $name
     * @return $this
     */
    public function setName($name);

    /**
     * Gets the product name.
     *
     * @return string
     */
    public function getName();

    /**
     * Sets the product categories.
     *
     * @param  array        $categories
     * @return $this
     */
    public function setCategories(array $categories);

    /**
     * Gets the product categories.
     *
     * @return array
     */
    public function getCategories();

    /**
     * Gets the product categories as json string.
     *
     * @return array
     */
    public function getCategoriesAsJson();

    /**
     * Gets the product categories as comma-separated string.
     *
     * @return array
     */
    public function getCategoriesAsString();

    /**
     * Sets the children.
     *
     * @param  array        $children
     * @return $this
     */
    public function setChildrenIds($children);

    /**
     * Gets the children.
     *
     * @return array
     */
    public function getChildrenIds();

    /**
     * Sets the product price.
     *
     * @param  mixed        $price
     * @return $this
     */
    public function setPrice($price);

    /**
     * Gets the product price.
     *
     * @return float
     */
    public function getPrice();

    /**
     * Sets the product quantity.
     *
     * @param  int          $quantity
     * @return $this
     */
    public function setQuantity($quantity);

    /**
     * Gets the product quantity.
     *
     * @return int
     */
    public function getQuantity();

    /**
     * Sets the product image.
     *
     * @param  string       $imageUrl
     * @return $this
     */
    public function setImageUrl($imageUrl);

    /**
     * Gets the product image.
     *
     * @return string
     */
    public function getImageUrl();

    /**
     * Sets the product type.
     *
     * @param  string       $type
     * @return $this
     */
    public function setType($type);

    /**
     * Gets the product type.
     *
     * @return string
     */
    public function getType();

    /**
     * Sets the product attribute set.
     *
     * @param  string       $attribute
     * @return $this
     */
    public function setAttributeSet($attribute);

    /**
     * Gets the product attribute set.
     *
     * @return string
     */
    public function getAttributeSet();

    /**
     * Sets whether the product is in stock.
     *
     * @param  bool         $stock
     * @return $this
     */
    public function setIsInStock($stock);

    /**
     * Gets whether the product is in stock.
     *
     * @return bool
     */
    public function getIsInStock();

    /**
     * Sets the product stock quantity.
     *
     * @param  int          $quantity
     * @return $this
     */
    public function setStockQuantity($quantity);

    /**
     * Gets the product stock quantity.
     *
     * @return int
     */
    public function getStockQuantity();

    /**
     * Sets the product manufacturer.
     *
     * @param  string       $manufacturer
     * @return $this
     */
    public function setManufacturer($manufacturer);

    /**
     * Gets the product manufacturer.
     *
     * @return string
     */
    public function getManufacturer();

    /**
     * Sets the product cost.
     *
     * @param  float        $cost
     * @return $this
     */
    public function setCost($cost);

    /**
     * Gets the product cost.
     *
     * @return float
     */
    public function getCost();
}