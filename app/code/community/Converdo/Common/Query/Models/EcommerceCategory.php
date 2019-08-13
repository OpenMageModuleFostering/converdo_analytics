<?php

namespace Converdo\Common\Query\Models;

use Converdo\Common\Query\Models\Contracts\EcommerceCategoryInterface;

class EcommerceCategory implements EcommerceCategoryInterface
{
    /**
     * @var float
     */
    protected $category;

    /**
     * @inheritDoc
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCategory()
    {
        return $this->category;
    }
}