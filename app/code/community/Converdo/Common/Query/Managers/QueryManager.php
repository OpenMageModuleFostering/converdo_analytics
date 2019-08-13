<?php

namespace Converdo\Common\Query\Managers;

use Converdo\Common\Query\Queries\Contracts\QueryInterface;

class QueryManager
{
    /**
     * Holds all QueryInterface instances.
     * 
     * @var QueryInterface[]
     */
    protected static $queries = [];

    /**
     * Holds all processed QueryInterface instances.
     *
     * @var QueryInterface[]
     */
    protected static $pushed = [];

    /**
     * Holds all parsed query strings.
     *
     * @var string[]
     */
    protected static $parsed = [];

    /**
     * Registers a Query. Registered Queries are processed by the plugin.
     * 
     * @param  QueryInterface   $query
     */
    public static function register(QueryInterface $query)
    {
        self::$queries[get_class($query)] = $query;
    }

    /**
     * Pushes a processed Query to the Manager.
     * 
     * @param  int              $position
     * @param  QueryInterface   $query
     */
    public static function push($position, QueryInterface $query)
    {
        self::$pushed[$position] = $query;
    }

    /**
     * Stores a parsed query string to the Manager.
     *
     * @param  int              $position
     * @param  string           $query
     */
    public static function store($position, $query)
    {
        self::$parsed[$position] = $query;

        ksort(self::$parsed);
    }

    /**
     * Returns all registered queries.
     *
     * @return QueryInterface[]
     */
    public static function registered()
    {
        return self::$queries;
    }

    /**
     * @return QueryMetadata
     */
    public static function metadata()
    {
        return cvd_app(QueryMetadata::class);
    }

    /**
     * Returns all pushed queries.
     *
     * @return QueryInterface[]
     */
    public static function pushed()
    {
        return self::$pushed;
    }

    /**
     * Returns all parsed queries.
     *
     * @return QueryInterface[]
     */
    public static function parsed()
    {
        return self::$parsed;
    }

    /**
     * Renders all query strings.
     *
     * @return string
     */
    public static function render()
    {
        return implode("\r\n\t\t", self::$parsed);
    }
}