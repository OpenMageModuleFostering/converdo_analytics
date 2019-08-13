<?php

namespace Converdo\Common\Container;

class Container
{
    /**
     * @var array
     */
    protected static $instances = [];

    /**
     * @var array
     */
    protected static $bindings = [];

    /**
     * Returns the Container instance.
     *
     * @return static
     */
    public static function instance()
    {
        return new static;
    }

    /**
     * Loads a class or returns an existing.
     *
     * @param  string       $string
     * @return mixed
     */
    public static function make($string)
    {
        if (! isset(self::$instances[$string])) {
            self::$instances[$string] = new $string;
        }

        return self::$instances[$string];
    }

    /**
     * Binds an interface to a concrete implementations.
     *
     * @param  mixed        $interface
     * @param  mixed        $concrete
     */
    public static function bind($interface, $concrete)
    {
        self::$bindings[$interface] = cvd_app($concrete);
    }

    /**
     * Returns the concrete implementation for the interface.
     *
     * @param  mixed        $interface
     * @return mixed
     * @throws \Exception
     */
    public static function resolve($interface)
    {
        if (! isset(self::$bindings[$interface])) {
            throw new \Exception("No concrete implementation found for {$interface}.");
        }

        return self::$bindings[$interface];
    }

    /**
     * Binds all interfaces to concrete implementations.
     *
     * @param  array        $bindings
     */
    public static function bindArray(array $bindings)
    {
        foreach ($bindings as $interface => $concrete) {
            self::bind($interface, $concrete);
        }
    }
}