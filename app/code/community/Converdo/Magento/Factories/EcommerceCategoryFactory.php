<?php

namespace Converdo\Magento\Factories;

use Converdo\Common\Query\Models\Contracts\EcommerceCategoryInterface;
use Converdo\Common\Query\Models\EcommerceCategory;
use Mage_Catalog_Model_Category;

class EcommerceCategoryFactory
{
    /**
     * @param  Mage_Catalog_Model_Category      $category
     * @return EcommerceCategoryInterface
     */
    public static function build(Mage_Catalog_Model_Category $category)
    {
        return (new EcommerceCategory())
                    ->setCategory($category->getName());
    }
}