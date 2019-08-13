<?php

class Converdo_Analytics_Models_EcommerceProduct
{
    use Converdo_Analytics_Support_Arrayable,
        Converdo_Analytics_Support_HoldsAttributes;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $category;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var float
     */
    protected $quantity;

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
     * Sets the Product Category.
     *
     * @param  string       $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Gets the Product Category.
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
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
        return (float) $this->price;
    }

    /**
     * Sets the Product Quantity.
     *
     * @param  float        $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Gets the Product Quantity.
     *
     * @return float
     */
    public function getQuantity()
    {
        return (float) $this->quantity;
    }

    /**
     * Returns the data as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            "_paq.push(['addEcommerceItem', '" . $this->getSku() . "', '" . $this->getName() . "', '" . $this->getCategory() . "', " . $this->getPrice() .", " . $this->getQuantity() . "]);",
        ];
    }
}