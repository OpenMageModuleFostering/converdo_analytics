<?php

namespace Converdo\Common\Query\Queries;

use Converdo\Common\Query\Managers\QueryManager;

class EnableHeartBeatTimer extends AbstractQuery
{
    /**
     * @inheritDoc
     */
    public function parse()
    {
        QueryManager::store(
            $this->position(),
            "_paq.push(['enableHeartBeatTimer']);"
        );
    }

    /**
     * @inheritDoc
     */
    public function position()
    {
        return 120;
    }
}