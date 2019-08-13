<?php

namespace Converdo\Common\Query\Models;

use Converdo\Common\Query\Models\Contracts\EcommerceCartInterface;

class EcommerceCart implements EcommerceCartInterface
{
    /**
     * @var float
     */
    protected $total;

    /**
     * @var float
     */
    protected $subtotal;

    /**
     * @inheritDoc
     */
    public function setTotal($total)
    {
        $this->total = (float) $total;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @inheritDoc
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = (float) $subtotal;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }
}