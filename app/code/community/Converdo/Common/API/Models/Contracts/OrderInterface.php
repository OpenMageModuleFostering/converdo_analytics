<?php

namespace Converdo\Common\API\Models\Contracts;

use Converdo\Common\Query\Models\EcommerceItem;

interface OrderInterface
{
    /**
     * Sets the order id.
     *
     * @param  mixed        $orderId
     * @return $this
     */
    public function setOrderId($orderId);

    /**
     * Gets the order id.
     *
     * @return mixed
     */
    public function getOrderId();

    /**
     * Sets the subtotal.
     *
     * @param  float        $subtotal
     * @return $this
     */
    public function setSubtotal($subtotal);

    /**
     * Gets the subtotal.
     *
     * @return float
     */
    public function getSubtotal();

    /**
     * Sets the tax fees.
     *
     * @param  float        $tax
     * @return $this
     */
    public function setTax($tax);

    /**
     * Gets the tax fees.
     *
     * @return float
     */
    public function getTax();

    /**
     * Sets the shipping fees.
     *
     * @param  float        $shipping
     * @return $this
     */
    public function setShipping($shipping);

    /**
     * Gets the shipping fees.
     *
     * @return float
     */
    public function getShipping();

    /**
     * Sets the discount.
     *
     * @param  float $discount
     * @return $this
     */
    public function setDiscount($discount);

    /**
     * Gets the discount.
     *
     * @return float
     */
    public function getDiscount();

    /**
     * Sets the customer data.
     *
     * @param array         $customer
     * @return $this
     */
    public function setCustomer(array $customer);

    /**
     * Gets the customer data.
     *
     * @param  mixed|null   $key
     * @return array
     */
    public function getCustomer($key = null);

    /**
     * Sets the products.
     *
     * @param  array        $products
     * @return $this
     */
    public function setProducts($products);

    /**
     * Gets the products.
     *
     * @return EcommerceItem[]
     */
    public function getProducts();

    /**
     * Sets the order status.
     *
     * @param  string           $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * Gets the order status.
     *
     * @return string
     */
    public function getStatus();

    /**
     * Sets the used coupon.
     *
     * @param  string           $coupon
     * @return string|null
     */
    public function setCoupon($coupon);

    /**
     * Gets the used coupon.
     *
     * @return string|null
     */
    public function getCoupon();

    /**
     * Gets the SKUs of all products in the cart.
     *
     * @return array
     */
    public function getProductSKUs();
}