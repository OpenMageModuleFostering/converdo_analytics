<?php

class Converdo_Analytics_Models_EcommerceOrder
{
    use Converdo_Analytics_Support_Arrayable;

    /**
     * @var int
     */
    protected $orderId;

    /**
     * @var float
     */
    protected $total;

    /**
     * @var float
     */
    protected $subtotal;

    /**
     * @var float
     */
    protected $tax;

    /**
     * @var float
     */
    protected $shipping;

    /**
     * Sets the Order ID.
     *
     * @param  int      $orderId
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Gets the Order ID.
     *
     * @return int
     */
    public function getOrderId()
    {
        return (int) $this->orderId;
    }

    /**
     * Sets the Order Total.
     *
     * @param  float        $total
     * @return $this
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Gets the Order Total.
     *
     * @return float
     */
    public function getTotal()
    {
        return (float) $this->total;
    }

    /**
     * Sets the Order Subtotal.
     *
     * @param  float        $subtotal
     * @return $this
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * Gets the Order Subtotal.
     *
     * @return float
     */
    public function getSubtotal()
    {
        return (float) $this->subtotal;
    }

    /**
     * Sets the Order Tax.
     *
     * @param  float        $tax
     * @return $this
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Gets the Order Tax.
     *
     * @return float
     */
    public function getTax()
    {
        return (float) $this->tax;
    }

    /**
     * Sets the Order Shipping.
     *
     * @param  float        $shipping
     * @return $this
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;

        return $this;
    }

    /**
     * Gets the Order Shipping.
     *
     * @return float
     */
    public function getShipping()
    {
        return (float) $this->shipping;
    }

    /**
     * Returns the data as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            "_paq.push(['trackEcommerceOrder', '" . $this->getOrderId() . "', " . $this->getTotal() . ", " . $this->getSubtotal() . ", " . $this->getTax() . ", " . $this->getShipping() . ", false]);",
        ];
    }
}