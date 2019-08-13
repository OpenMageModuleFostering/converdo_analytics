<?php

namespace Converdo\Common\Query\Models\Contracts;

interface EcommerceCategoryInterface
{
    /**
     * Sets the category.
     *
     * @param  string           $category
     * @return $this
     */
    public function setCategory($category);

    /**
     * Gets the category.
     *
     * @return string
     */
    public function getCategory();
}