<?php

namespace Converdo\Common\Query\Queries;

use Converdo\Common\Query\Managers\QueryManager;

class SiteId extends AbstractQuery
{
    /**
     * @inheritDoc
     */
    public function process()
    {
        $this->set('website', cvd_config()->platform()->website());
    }
    
    /**
     * @inheritDoc
     */
    public function parse()
    {
        QueryManager::store(
            $this->position(),
            "_paq.push(['setSiteId', '{$this->get('website')}']);"
        );
    }

    /**
     * @inheritDoc
     */
    public function position()
    {
        return 0;
    }
}