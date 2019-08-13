<?php

interface Converdo_Tracker_Query_Interface_QueryInterface
{
    /**
     * Returns the query key.
     *
     * @return mixed
     */
    public function view();

    /**
     * Returns the query parameters.
     *
     * @return array
     */
    public function parameters();

    /**
     * Pass additional data to the query.
     *
     * @param  array        $entities
     * @return $this
     */
    public function with(array $entities = []);
}