<?php

namespace Converdo\Common\API\Models;

use Converdo\Common\API\Models\Contracts\OrderInterface;

class Order implements OrderInterface
{
    /**
     * @var mixed
     */
    protected $orderId;

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
     * @var float
     */
    protected $discount;

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
     * @var string
     */
    protected $coupon;

    /**
     * @inheritDoc
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @inheritDoc
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = round($subtotal, 2);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * @inheritDoc
     */
    public function setTax($tax)
    {
        $this->tax = (float) $tax;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getTax()
    {
        return (float) $this->tax;
    }

    /**
     * @inheritDoc
     */
    public function setShipping($shipping)
    {
        $this->shipping = (float) $shipping;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @inheritDoc
     */
    public function setDiscount($discount)
    {
        $this->discount = (float) $discount;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @inheritDoc
     */
    public function setCustomer(array $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCustomer($key = null)
    {
        if ($key) {
            return $this->customer[$key];
        }

        return (array) $this->customer;
    }

    /**
     * @inheritDoc
     */
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getProducts()
    {
        return (array) $this->products;
    }

    /**
     * @inheritDoc
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStatus()
    {
        return (string) $this->status;
    }

    /**
     * @inheritDoc
     */
    public function setCoupon($coupon)
    {
        $this->coupon = $coupon;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * @inheritDoc
     */
    public function getProductSKUs()
    {
        $skus = [];

        foreach ($this->getProducts() as $product) {
            $skus[] = $product->getSKU();
        }

        return $skus;
    }
}