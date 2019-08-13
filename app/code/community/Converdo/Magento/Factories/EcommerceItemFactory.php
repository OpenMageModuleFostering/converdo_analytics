<?php

namespace Converdo\Magento\Factories;

use Converdo\Common\Query\Models\EcommerceItem;
use Converdo\Common\Query\Models\Contracts\EcommerceItemInterface;
use Converdo\Magento\Support\PriceHelper;
use Mage;
use Mage_Catalog_Model_Product;
use Mage_Sales_Model_Quote_Item;

class EcommerceItemFactory
{
    /**
     * @param  Mage_Catalog_Model_Product           $original
     * @param  Mage_Sales_Model_Quote_Item|null     $product
     * @return EcommerceItemInterface
     */
    public static function build(Mage_Catalog_Model_Product $original, Mage_Sales_Model_Quote_Item $product = null)
    {
        return (new EcommerceItem())
                    ->setId($product ? $product->getId() : $original->getId())
                    ->setSKU($product ? $product->getSku() : $original->getSku())
                    ->setName($product ? $product->getName() : $original->getName())
                    ->setCategories(self::categories($original->getCategoryIds()))
                    ->setChildrenIds(self::children($original))
                    ->setPrice($product ? $product->getPrice() : PriceHelper::resolve($original))
                    ->setQuantity($product ? $product->getQty() : 1)
                    ->setImageUrl($original->getImageUrl())
                    ->setType($original->getTypeId())
                    ->setIsInStock($original->getStockItem()->getIsInStock())
                    ->setStockQuantity($original->getStockItem()->getQty())
                    ->setManufacturer($original->getData('manufacturer'))
                    ->setCost($original->getData('cost'))
            ;
    }

    /**
     * Loads up to five product categories.
     *
     * @param  array        $ids
     * @return array
     */
    protected static function categories(array $ids)
    {
        $categories = array_filter($ids);

        $categories = array_splice($categories, 0, 5);

        foreach ($ids as $key => $id) {
            $category = Mage::getModel('catalog/category')->load($id);
            $categories[$key] = addslashes($category->getName());
        }

        return (array) $categories;
    }

    /**
     * Fetches the IDs for all children products.
     *
     * @param  Mage_Catalog_Model_Product       $product
     * @return array
     */
    protected static function children(Mage_Catalog_Model_Product $product)
    {
        if ($product->getType() !== 'configurable') {
            return [];
        }

        $children = Mage::getModel('catalog/product_type_configurable')->getChildrenIds($product->getId());

        if (count($children) <= 0) {
            return [];
        }

        return array_keys($children[0]);
    }
}