<?php

namespace Converdo\Magento\Support;

use Mage_Catalog_Model_Product;
use Mage_Catalog_Model_Product_Type;

class PriceHelper
{
    /**
     * Returns the final product price.
     *
     * @param  Mage_Catalog_Model_Product       $product
     * @return float
     */
    public static function resolve(Mage_Catalog_Model_Product $product)
    {
        // Returns the minimum value of the bundled product.
        if ($product->getTypeId() === Mage_Catalog_Model_Product_Type::TYPE_BUNDLE) {
            $minmax = $product->getPriceModel()->getTotalPrices($product, null, null, false);

            return is_array($minmax) ? reset($minmax) : 0;
        }

        // Returns the default final price of the product.
        return (float) $product->getFinalPrice();
    }
}