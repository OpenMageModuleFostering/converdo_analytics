<?php

namespace Converdo\Common\Page\Models;

use Converdo\Common\Page\Models\Contracts\PageInterface;

class Page implements PageInterface
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $subtype;

    /**
     * @inheritDoc
     */
    public function setSubtype($subtype)
    {
        $this->subtype = $subtype;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getSubtype()
    {
        return $this->subtype;
    }

    /**
     * @inheritDoc
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getType()
    {
        return $this->type;
    }
}