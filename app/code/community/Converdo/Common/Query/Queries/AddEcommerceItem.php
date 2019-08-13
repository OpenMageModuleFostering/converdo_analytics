<?php

namespace Converdo\Common\Query\Queries;

use Converdo\Common\Query\Managers\QueryManager;

class AddEcommerceItem extends AbstractQuery
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
        $this->set('products', cvd_config()->platform()->getActiveCartProducts());
    }
    
    /**
     * @inheritDoc
     */
    public function parse()
    {
        foreach ($this->get('products') as $key => $product) {
            QueryManager::store(
                $this->position() + $key,
                "_paq.push(['addEcommerceItem', '{$product->getSku()}', '{$product->getName()}', {$product->getCategoriesAsJson()}, {$product->getPrice()}, {$product->getQuantity()}]);"
            );
        }
    }

    /**
     * @inheritDoc
     */
    public function position()
    {
        return 20;
    }
}