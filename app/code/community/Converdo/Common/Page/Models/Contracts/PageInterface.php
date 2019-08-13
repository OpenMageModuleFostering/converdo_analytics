<?php

namespace Converdo\Common\Page\Models\Contracts;

interface PageInterface
{
    /**
     * Sets the subtype.
     *
     * @param  string       $subtype
     * @return $this
     */
    public function setSubtype($subtype);

    /**
     * Gets the subtype.
     *
     * @return string
     */
    public function getSubtype();

    /**
     * Sets the type.
     *
     * @param  string       $type
     * @return $this
     */
    public function setType($type);

    /**
     * Gets the type.
     *
     * @return string
     */
    public function getType();
}