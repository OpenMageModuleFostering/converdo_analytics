<?php

namespace Converdo\Common\Support;

trait Arrayable
{
    /**
     * Returns instance properties as an array.
     *
     * @param  null         $key
     * @return array|null
     */
    public function toArray($key = null)
    {
        $properties = get_object_vars($this);

        if (! $key) {
            return $properties;
        }

        if (! isset($properties[$key])) {
            return null;
        }

        return (array) $properties[$key];
    }

    /**
     * Returns the instance property keys.
     *
     * @return array
     */
    public function keys()
    {
        return array_keys(get_object_vars($this));
    }
}