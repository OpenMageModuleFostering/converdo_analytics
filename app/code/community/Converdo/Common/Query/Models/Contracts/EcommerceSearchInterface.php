<?php

namespace Converdo\Common\Query\Models\Contracts;

interface EcommerceSearchInterface
{
    /**
     * Sets the search keyword.
     *
     * @param  string       $keyword
     * @return $this
     */
    public function setKeyword($keyword);

    /**
     * Gets the search keyword.
     *
     * @return string
     */
    public function getKeyword();

    /**
     * Sets the search category.
     *
     * @param  string       $category
     * @return $this
     */
    public function setCategory($category);

    /**
     * Gets the search category.
     *
     * @return string
     */
    public function getCategory();

    /**
     * Sets the search result count.
     *
     * @param  int          $count
     * @return $this
     */
    public function setResultCount($count);

    /**
     * Gets the search result count.
     *
     * @return int
     */
    public function getResultCount();
}