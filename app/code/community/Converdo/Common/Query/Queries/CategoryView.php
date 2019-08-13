<?php

namespace Converdo\Common\Query\Queries;

use Converdo\Common\Query\Managers\QueryManager;

class CategoryView extends AbstractQuery
{
    /**
     * @inheritDoc
     */
    public function responsible()
    {
        return cvd_config()->platform()->isCategoryPage();
    }
    
    /**
     * @inheritDoc
     */
    public function process()
    {
        $this->set('category', cvd_config()->platform()->getViewedCategory());
    }
    
    /**
     * @inheritDoc
     */
    public function parse()
    {
        QueryManager::store(
            $this->position(),
            "_paq.push(['setEcommerceView', false, false, '{$this->get('category')->getCategory()}']);"
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