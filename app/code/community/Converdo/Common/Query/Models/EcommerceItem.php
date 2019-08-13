<?php

namespace Converdo\Common\Query\Models;

use Converdo\Common\Query\Models\Contracts\EcommerceItemInterface;

class EcommerceItem implements EcommerceItemInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $categories = [];

    /**
     * @var array
     */
    protected $children = [];

    /**
     * @var float
     */
    protected $price;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var string
     */
    protected $imageUrl;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var bool
     */
    protected $isInStock;

    /**
     * @var float
     */
    protected $stockQuantity;

    /**
     * @var string
     */
    protected $manufacturer;

    /**
     * @var float
     */
    protected $cost;

    /**
     * @inheritDoc
     */
    public function setId($id)
    {
        $this->id = (int) $id;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function setSKU($sku)
    {
        $this->sku = (string) $sku;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getSKU()
    {
        return $this->sku;
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        $this->name = (string) $name;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function setCategories(array $categories)
    {
        $this->categories = (array) $categories;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @inheritDoc
     */
    public function getCategoriesAsJson()
    {
        return json_encode($this->categories);
    }

    /**
     * @inheritDoc
     */
    public function getCategoriesAsString()
    {
        return implode(', ', $this->categories);
    }

    /**
     * @inheritDoc
     */
    public function setChildrenIds($children)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getChildrenIds()
    {
        return $this->children;
    }
    
    /**
     * @inheritDoc
     */
    public function setPrice($price)
    {
        $this->price = (float) $price;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @inheritDoc
     */
    public function setQuantity($quantity)
    {
        $this->quantity = (int) $quantity;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @inheritDoc
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @inheritDoc
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @inheritDoc
     */
    public function setIsInStock($stock)
    {
        $this->isInStock = (bool) $stock;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getIsInStock()
    {
        return $this->isInStock;
    }

    /**
     * @inheritDoc
     */
    public function setStockQuantity($quantity)
    {
        $this->stockQuantity = (float) $quantity;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStockQuantity()
    {
        return $this->stockQuantity;
    }

    /**
     * @inheritDoc
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @inheritDoc
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCost()
    {
        return $this->cost;
    }
}