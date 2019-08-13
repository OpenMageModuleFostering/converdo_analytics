<?php

namespace Converdo\Common\Support;

trait HasParameters
{
    /**
     * The parameter bag.
     *
     * @var array
     */
    protected $parameters = [];

    /**
     * Sets a parameter by name.
     *
     * @param  string       $key
     * @param  mixed        $value
     */
    public function set($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * Returns a parameter by name.
     *
     * @param  string       $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->has($key) ? $this->parameters[$key] : null;
    }

    /**
     * Returns true if the parameter is defined.
     *
     * @param  string       $key
     * @return mixed
     */
    public function has($key)
    {
        return isset($this->parameters[$key]);
    }

    /**
     * Returns the parameters.
     *
     * @return array
     */
    public function all()
    {
        return $this->parameters;
    }

    /**
     * Returns the parameter keys.
     *
     * @return array
     */
    public function keys()
    {
        return array_keys($this->parameters);
    }
}