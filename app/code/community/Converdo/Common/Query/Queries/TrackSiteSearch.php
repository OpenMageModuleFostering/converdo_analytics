<?php

namespace Converdo\Common\Query\Queries;

use Converdo\Common\Query\Managers\QueryManager;

class TrackSiteSearch extends AbstractQuery
{
    /**
     * @inheritDoc
     */
    public function responsible()
    {
        return cvd_config()->platform()->isSearchPage();
    }
    
    /**
     * @inheritDoc
     */
    public function process()
    {
        $this->set('search', cvd_config()->platform()->getSearch());

        $page = cvd_config()->route()->current();

        $this->metadata()->set('pt1', $page->getType());
        $this->metadata()->set('pt2', $page->getSubtype());
    }
    
    /**
     * @inheritDoc
     */
    public function parse()
    {
        QueryManager::store(
            $this->position(),
            "_paq.push(['trackSiteSearch', '{$this->get('search')->getKeyword()}', false, {$this->get('search')->getResultCount()}]);"
        );
    }

    /**
     * @inheritDoc
     */
    public function position()
    {
        return 10;
    }
}