<?php

class Converdo_Analytics_API_Models_Order
{
    /**
     * @var mixed
     */
    protected $orderId;

    /**
     * @var string
     */
    protected $orderIdUrl;

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
     * @var array
     */
    protected $customer = [];

    /**
     * @var array
     */
    protected $products = [];

    /**
     * @var string
     */
    protected $status;

    /**
     * Sets the order id.
     *
     * @param  mixed        $orderId
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        $this->setOrderIdUrl($orderId);

        return $this;
    }

    /**
     * Sets the order id url.
     *
     * @param  mixed        $orderId
     * @return $this
     */
    public function setOrderIdUrl($orderId)
    {
        $this->orderIdUrl = Mage::getUrl('adminhtml/sales_order/view', [
            'order_id' => $orderId,
            '_type'    => Mage_Core_Model_Store::URL_TYPE_WEB,
        ]);

        return $this;
    }

    /**
     * Gets the order id url.
     *
     * @return string
     */
    public function getOrderIdUrl()
    {
        return $this->orderIdUrl;
    }

    /**
     * Gets the order id.
     *
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Sets the subtotal.
     *
     * @param  float        $subtotal
     * @return $this
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = round($subtotal, 2);

        return $this;
    }

    /**
     * Gets the subtotal.
     *
     * @return float
     */
    public function getSubtotal()
    {
        return (float) $this->subtotal;
    }

    /**
     * Sets the tax fees.
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
     * Gets the tax fees.
     *
     * @return float
     */
    public function getTax()
    {
        return (float) $this->tax;
    }

    /**
     * Sets the shipping fees.
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
     * Gets the shipping fees.
     *
     * @return float
     */
    public function getShipping()
    {
        return (float) $this->shipping;
    }

    /**
     * Sets the customer data.
     *
     * @param array         $customer
     * @return $this
     */
    public function setCustomer(array $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Gets the customer data.
     *
     * @param  mixed|null   $key
     * @return array
     */
    public function getCustomer($key = null)
    {
        if ($key) {
            return $this->customer[$key];
        }

        return (array) $this->customer;
    }

    /**
     * Sets the products.
     *
     * @param  array        $products
     * @return $this
     */
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * Gets the products.
     *
     * @return array
     */
    public function getProducts()
    {
        return (array) $this->products;
    }

    /**
     * Sets the order status.
     *
     * @param  string           $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Gets the order status.
     *
     * @return string
     */
    public function getStatus()
    {
        return (string) $this->status;
    }

    /**
     * Gets the SKUs of all products in the cart.
     *
     * @return array
     */
    public function getProductSkus()
    {
        $skus = [];

        foreach ($this->getProducts() as $product) {
            $skus[] = $product['sku'];
        }

        return $skus;
    }
}