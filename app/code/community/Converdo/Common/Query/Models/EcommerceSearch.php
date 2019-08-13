<?php

namespace Converdo\Common\Query\Models;

use Converdo\Common\Query\Models\Contracts\EcommerceSearchInterface;

class EcommerceSearch implements EcommerceSearchInterface
{
    /**
     * @var string
     */
    protected $keyword;

    /**
     * @var string|false
     */
    protected $category = false;

    /**
     * @var string
     */
    protected $count;

    /**
     * @inheritDoc
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

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

    /**
     * @inheritDoc
     */
    public function setResultCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getResultCount()
    {
        return $this->count;
    }
}