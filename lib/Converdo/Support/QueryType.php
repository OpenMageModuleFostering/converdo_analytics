<?php

class Converdo_Support_QueryType
{
    protected static $integer = 2;
    protected static $string = 1;
    protected static $float = 3;
    protected static $null = 4;

    /**
     * Forces the query parameter to parse as a string.
     *
     * @return int
     */
    public static function string()
    {
        return self::$string;
    }

    /**
     * Forces the query parameter to parse as an integer.
     *
     * @return int
     */
    public static function integer()
    {
        return self::$integer;
    }

    /**
     * Forces the query parameter to parse as a float.
     *
     * @return int
     */
    public static function float()
    {
        return self::$float;
    }

    /**
     * Forces the query parameter to parse as null.
     *
     * @return int
     */
    public static function null()
    {
        return self::$null;
    }
}