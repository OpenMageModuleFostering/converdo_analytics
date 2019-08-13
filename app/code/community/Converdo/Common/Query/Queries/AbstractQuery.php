<?php

namespace Converdo\Common\Query\Queries;

use Converdo\Common\Query\Managers\QueryMetadata;
use Converdo\Common\Query\Queries\Contracts\QueryInterface;
use Converdo\Common\Support\HasParameters;

abstract class AbstractQuery implements QueryInterface
{
    use HasParameters;

    /**
     * @inheritDoc
     */
    public function responsible()
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function process()
    {
        // process data.
    }

    /**
     * @return QueryMetadata
     */
    public function metadata()
    {
        return cvd_app(QueryMetadata::class);
    }

    /**
     * @inheritDoc
     */
    abstract public function parse();
}