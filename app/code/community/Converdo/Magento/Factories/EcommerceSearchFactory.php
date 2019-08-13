<?php

namespace Converdo\Magento\Factories;

use Converdo\Common\Query\Models\Contracts\EcommerceSearchInterface;
use Converdo\Common\Query\Models\EcommerceSearch;
use Mage_CatalogSearch_Helper_Data;

class EcommerceSearchFactory
{
    /**
     * @param  Mage_CatalogSearch_Helper_Data       $search
     * @return EcommerceSearchInterface
     */
    public static function build(Mage_CatalogSearch_Helper_Data $search)
    {
        return (new EcommerceSearch())
                    ->setKeyword($search->getQueryText())
                    ->setResultCount(
                        $search->getEngine()->getResultCollection()->addSearchFilter(
                            $search->getQuery()->getQueryText()
                        )->getSize()
                    );
    }
}