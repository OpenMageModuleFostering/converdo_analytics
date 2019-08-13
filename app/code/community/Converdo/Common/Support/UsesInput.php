<?php

namespace Converdo\Common\Support;

use Converdo\Common\Input\InputManager;

trait UsesInput
{
    /**
     * Returns the Input.
     *
     * @return \Converdo\Common\Input\Input
     */
    public function input()
    {
        return InputManager::get();
    }
}