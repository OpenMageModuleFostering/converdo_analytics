<?php

namespace Converdo\Common\Query\Queries;

use Converdo\Common\Query\Managers\QueryManager;

class TrackEcommerceCart extends AbstractQuery
{
    /**
     * @inheritDoc
     */
    public function responsible()
    {
        return cvd_config()->platform()->hasActiveCart();
    }
    
    /**
     * @inheritDoc
     */
    public function process()
    {
        $this->set('cart', cvd_config()->platform()->getActiveCart());
    }
    
    /**
     * @inheritDoc
     */
    public function parse()
    {
        QueryManager::store(
            $this->position(),
            "_paq.push(['trackEcommerceCartUpdate', {$this->get('cart')->getTotal()}]);"
        );
    }

    /**
     * @inheritDoc
     */
    public function position()
    {
        return 30;
    }
}