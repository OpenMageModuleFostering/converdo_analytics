<?php

namespace Converdo\Common\Input;

use Converdo\Common\Support\HasParameters;

class Input
{
    use HasParameters;

    /**
     * Reads all given values.
     *
     * @param  array        $values
     * @return $this
     */
    public function read(array $values)
    {
        foreach ($values as $key => $value) {
            $this->set($key, $value);
        }

        return $this;
    }
}