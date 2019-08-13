<?php

class Converdo_Analytics_Models_EcommerceView
{
    use Converdo_Analytics_Support_Arrayable,
        Converdo_Analytics_Support_HoldsAttributes;

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
     * @var mixed
     */
    protected $categories = [];

    /**
     * @var float|null
     */
    protected $price;

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
     * @var int
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
     * Sets the product id.
     *
     * @param  int      $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the product id.
     *
     * @return int
     */
    public function getId()
    {
        return (int) $this->id;
    }

    /**
     * Sets the product sku.
     *
     * @param  string       $sku
     * @return $this
     */
    public function setSku($sku)
    {
        $this->sku = (string) $sku;

        return $this;
    }

    /**
     * Gets the product sku.
     *
     * @return string
     */
    public function getSku()
    {
        return (string) $this->sku;
    }

    /**
     * Sets the product name.
     *
     * @param  string       $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the product name.
     *
     * @return string
     */
    public function getName()
    {
        return (string) $this->name;
    }

    /**
     * Sets the product categories (up to five).
     *
     * @param  array    $categories
     * @return          $this
     */
    public function setCategories($categories)
    {
        foreach ($categories as $category) {
            $category = Mage::getModel('catalog/category')->load($category);
            $this->categories[] = addslashes($category->getName());
        }

        $this->categories = array_filter($this->categories);
        $this->categories = array_splice($this->categories, 0, 5);

        return $this;
    }

    /**
     * Gets the product categories.
     *
     * @return string
     */
    public function getCategories()
    {
        return (array) $this->categories;
    }

    /**
     * Sets the product price.
     *
     * @param  float        $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Gets the product price.
     *
     * @return float|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the product image url.
     *
     * @param  string       $imageUrl
     * @return $this
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Gets the product image url.
     *
     * @return string
     */
    public function getImageUrl()
    {
        return (string) $this->imageUrl;
    }

    /**
     * Sets the product type.
     *
     * @param  int          $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets the product type.
     *
     * @return int
     */
    public function getType()
    {
        return (string) $this->type;
    }

    /**
     * Sets the product stock.
     *
     * @param  bool         $isInStock
     * @return $this
     */
    public function setIsInStock($isInStock)
    {
        $this->isInStock = $isInStock;

        return $this;
    }

    /**
     * Gets the product stock.
     *
     * @return bool
     */
    public function getIsInStock()
    {
        return (bool) $this->isInStock;
    }

    /**
     * Sets the product stock quantity.
     *
     * @param  int          $quantity
     * @return $this
     */
    public function setStockQuantity($quantity)
    {
        $this->stockQuantity = $quantity;

        return $this;
    }

    /**
     * Gets the product stock quantity.
     *
     * @return bool
     */
    public function getStockQuantity()
    {
        return (float) $this->stockQuantity;
    }

    /**
     * Sets the manufacturer.
     *
     * @param  string       $manufacturer
     * @return $this
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Gets the manufacturer.
     *
     * @return string
     */
    public function getManufacturer()
    {
        return (string) $this->manufacturer;
    }

    /**
     * Sets the product cost.
     *
     * @param  float        $cost
     * @return $this
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Gets the Product cost.
     *
     * @return float
     */
    public function getCost()
    {
        return (float) $this->cost;
    }

    /**
     * Retrieves the Product IDs of children for a configurable product.
     *
     * @return  array
     */
    protected function resolveChildren()
    {
        if ($this->getType() !== 'configurable') {
            return [];
        }

        $children = Mage::getModel('catalog/product_type_configurable')->getChildrenIds($this->getId());

        if (count($children) <= 0) {
            return [];
        }

        return array_keys($children[0]);
    }

    /**
     * Adds attributes to the stack.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'pti'       => $this->getName(),

            // Product Sku
            'sku'       => $this->getSku(),

            // Product Price
            'pri'       => $this->getPrice(),

            // Product Image
            'ima'       => $this->getImageUrl(),

            // Product categories
            'cat'       => implode(', ', $this->getCategories()),

            // Product Id
            'rid'       => $this->getId(),

            // Product Children Id
            'tid'       => $this->resolveChildren(),

            // Product Type
            'typ'       => $this->getType(),

            // Product Attributes
            'att'       => null,

            // Product Is In Stock
            'stb'       => $this->getIsInStock(),

            // Product Brand
            'bra'       => $this->getManufacturer(),

            // Product Cost
            'cos'       => $this->getCost(),

            // Product Stock Quantity
            'sqn'       => $this->getStockQuantity(),
        ];
    }

    /**
     * Returns the data as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            "_paq.push(['setEcommerceView', '" . $this->getSku() . "', '" . $this->getName() . "', '" . implode(', ', $this->getCategories()) . "', " . $this->getPrice() . "]);",
        ];
    }
}