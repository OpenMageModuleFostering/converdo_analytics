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
     * Sets the Product ID.
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
     * Gets the Product ID.
     *
     * @return int
     */
    public function getId()
    {
        return (int) $this->id;
    }

    /**
     * Sets the Product Sku.
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
     * Gets the Product Sku.
     *
     * @return string
     */
    public function getSku()
    {
        return (string) $this->sku;
    }

    /**
     * Sets the Product Name.
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
     * Gets the Product Name.
     *
     * @return string
     */
    public function getName()
    {
        return (string) $this->name;
    }

    /**
     * Sets the Product Categories (up to five).
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

        $this->categories = array_splice(array_filter($this->categories), 0, 5);

        return $this;
    }

    /**
     * Gets the Product Categories.
     *
     * @return null|string
     */
    public function getCategories()
    {
        return (array) $this->categories;
    }

    /**
     * Sets the Product Price.
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
     * Gets the Product Price.
     *
     * @return float|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the Product Image URL.
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
     * Gets the Product Image URL.
     *
     * @return string
     */
    public function getImageUrl()
    {
        return (string) $this->imageUrl;
    }

    /**
     * Sets the Product Type.
     *
     * @param  int      $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets the Product Type.
     *
     * @return int
     */
    public function getType()
    {
        return (string) $this->type;
    }

    /**
     * Sets the Product Stock.
     *
     * @param  bool     $isInStock
     * @return $this
     */
    public function setIsInStock($isInStock)
    {
        $this->isInStock = $isInStock;

        return $this;
    }

    /**
     * Gets the Product Stock.
     *
     * @return bool
     */
    public function getIsInStock()
    {
        return (bool) $this->isInStock;
    }

    /**
     * Sets the Product Stock Quantity.
     *
     * @param  int      $quantity
     * @return $this
     */
    public function setStockQuantity($quantity)
    {
        $this->stockQuantity = $quantity;

        return $this;
    }

    /**
     * Gets the Product Stock Quantity.
     *
     * @return bool
     */
    public function getStockQuantity()
    {
        return (float) $this->stockQuantity;
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

        if (count($children) < 0) {
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

            // Product Is In Stock
            'bra'       => null,

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