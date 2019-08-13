<?php

class Converdo_Analytics_Models_EcommerceCartUpdate
{
    use Converdo_Analytics_Support_Arrayable;

    /**
     * @var float
     */
    protected $total;

    /**
     * Sets the Cart Total.
     *
     * @param  float        $total
     * @return $this
     */
    public function setTotal($total)
    {
        $this->total = (float) $total;

        return $this;
    }

    /**
     * Gets the Product Sku.
     *
     * @return string
     */
    public function getTotal()
    {
        return (float) $this->total;
    }

    /**
     * Returns the data as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            "_paq.push(['trackEcommerceCartUpdate', " . $this->getTotal() . "]);",
        ];
    }
}