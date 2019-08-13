<?php

class Converdo_Support_QueryParser
{
    /**
     * @var array
     */
    protected static $queries = [];

    /**
     * @var mixed
     */
    protected static $entity;

    /**
     * @param $entity
     */
    public static function entity($entity)
    {
        self::$entity = $entity;
    }

    /**
     * Adds a Tracker Query.
     *
     * @param  Converdo_Tracker_Query_Interface_QueryInterface  $query
     * @param  array                                            $options
     */
    public static function add(Converdo_Tracker_Query_Interface_QueryInterface $query, array $options = [])
    {
        $parameters = $query->with([self::$entity])->parameters();

        $parameters = $parameters + $options;

        ksort($parameters);

        $output = self::toString($query, $parameters);

        self::$queries[] = $output;
    }

    /**
     * @return string
     */
    public static function parse()
    {
        return implode("\n\t\t\t\t", self::$queries);
    }

    protected static function toString(Converdo_Tracker_Query_Interface_QueryInterface $query, array $parameters = [])
    {
        $output = new Converdo_Support_StringBuilder();

        $output->append("_paq.push(['{$query->view()}'");

        foreach ($parameters as $key => $value) {
            $value = self::resolve($value);
            $output->append(", {$value}");
        }

        $output->append("]);");

        return $output->toString();
    }

    protected static function resolve($value)
    {
        if (count($value) === 1 && $value[0] === Converdo_Support_QueryType::null()) {
            return (string) "false";
        }

        if (count($value) === 1) {
            return (string) "'" . $value[0] . "'";
        }

        switch ($value[0]) {
            case Converdo_Support_QueryType::float():
                return (float) $value[1];

            case Converdo_Support_QueryType::integer():
                return (int) $value[1];

            case Converdo_Support_QueryType::null():
                return (string) "false";

            case Converdo_Support_QueryType::string():
                return (string) "'" . $value[1] . "'";
        }

        return (string) "'" . $value[1] . "'";
    }
}