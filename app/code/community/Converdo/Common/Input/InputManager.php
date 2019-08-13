<?php

namespace Converdo\Common\Input;

class InputManager
{
    /**
     * @var Input
     */
    protected static $input;

    /**
     * Reads the Request parameters.
     */
    public static function read()
    {
        self::$input = (new Input())->read($_REQUEST);
    }

    /**
     * Returns the Input.
     *
     * @return Input
     */
    public static function get()
    {
        return self::$input;
    }
}