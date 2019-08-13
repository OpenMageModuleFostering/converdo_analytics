<?php

namespace Converdo\Common\Query\Queries\Contracts;

interface QueryInterface
{
    /**
     * Determines whether the query should process on the tracker.
     *
     * @return bool
     */
    public function responsible();

    /**
     * Determines the position of the query in the output.
     *
     * @return int
     */
    public function position();

    /**
     * Processes the data required for the tracker query.
     *
     * @return mixed
     */
    public function process();

    /**
     * Parses the query string and stores it in the QueryManager.
     *
     * @return string
     */
    public function parse();
}