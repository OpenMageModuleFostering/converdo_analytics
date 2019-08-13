<?php

namespace Converdo\Common\Query\Models\Contracts;

interface EcommerceCartInterface
{
    /**
     * Sets the cart total value.
     *
     * @param  float        $total
     * @return $this
     */
    public function setTotal($total);

    /**
     * Gets the cart total value.
     *
     * @return float
     */
    public function getTotal();

    /**
     * Sets the cart subtotal value.
     *
     * @param  float        $subtotal
     * @return $this
     */
    public function setSubtotal($subtotal);

    /**
     * Gets the cart subtotal value.
     *
     * @return float
     */
    public function getSubtotal();
}