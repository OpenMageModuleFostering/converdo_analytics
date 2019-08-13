<?php

namespace Converdo\Common\Query\Queries;

use Converdo\Common\Query\Managers\QueryManager;

class TrackerUrl extends AbstractQuery
{
    /**
     * @inheritDoc
     */
    public function process()
    {
        $this->set('url', cvd_config()->url('tracker.php'));
    }
    
    /**
     * @inheritDoc
     */
    public function parse()
    {
        QueryManager::store(
            $this->position(),
            "_paq.push(['setTrackerUrl', '{$this->get('url')}']);"
        );
    }

    /**
     * @inheritDoc
     */
    public function position()
    {
        return 1;
    }
}