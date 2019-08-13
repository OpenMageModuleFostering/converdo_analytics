<?php

namespace Converdo\Common\Query\Queries;

use Converdo\Common\Query\Managers\QueryManager;

class EnableLinkTracking extends AbstractQuery
{
    /**
     * @inheritDoc
     */
    public function parse()
    {
        QueryManager::store(
            $this->position(),
            "_paq.push(['enableLinkTracking']);"
        );
    }

    /**
     * @inheritDoc
     */
    public function position()
    {
        return 110;
    }
}