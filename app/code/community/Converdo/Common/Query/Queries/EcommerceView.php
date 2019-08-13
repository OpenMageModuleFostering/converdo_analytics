<?php

namespace Converdo\Common\Query\Queries;

use Converdo\Common\Query\Managers\QueryManager;

class EcommerceView extends AbstractQuery
{
    /**
     * @inheritDoc
     */
    public function responsible()
    {
        return cvd_config()->platform()->isProductPage();
    }
    
    /**
     * @inheritDoc
     */
    public function process()
    {
        $product = cvd_config()->platform()->getViewedProduct();

        $this->set('product', $product);

        $this->metadata()->set('sku', $product->getSKU());
        $this->metadata()->set('pti', $product->getName());
        $this->metadata()->set('pri', $product->getPrice());
        $this->metadata()->set('ima', $product->getImageUrl());
        $this->metadata()->set('cat', $product->getCategories());
        $this->metadata()->set('rid', $product->getId());
        $this->metadata()->set('tid', $product->getChildrenIds());
        $this->metadata()->set('typ', $product->getType());
        $this->metadata()->set('att', $product->getAttributeSet());
        $this->metadata()->set('stb', $product->getIsInStock());
        $this->metadata()->set('sqn', $product->getStockQuantity());
        $this->metadata()->set('bra', $product->getManufacturer());
        $this->metadata()->set('cos', $product->getCost());
    }
    
    /**
     * @inheritDoc
     */
    public function parse()
    {
        QueryManager::store(
            $this->position(),
            "_paq.push(['setEcommerceView', '{$this->get('product')->getSku()}', '{$this->get('product')->getName()}', {$this->get('product')->getCategoriesAsJson()}, {$this->get('product')->getPrice()}]);"
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