<?php

namespace Converdo\Magento\Config;

use Converdo\Common\Config\AbstractPlatformConfiguration;
use Converdo\Common\Page\Support\PageTypes;
use Converdo\Magento\Container\Bindings;
use Converdo\Magento\Factories\EcommerceCartFactory;
use Converdo\Magento\Factories\EcommerceCategoryFactory;
use Converdo\Magento\Factories\EcommerceItemFactory;
use Converdo\Magento\Factories\EcommerceSearchFactory;
use Mage;

class Configuration extends AbstractPlatformConfiguration
{
    /**
     * @var bool
     */
    protected $enabled = true;

    /**
     * @inheritDoc
     */
    public function enabled($store = null)
    {
        return Mage::getStoreConfig('converdo/analytics/site', $store)
            && Mage::getStoreConfigFlag('converdo/analytics/active', $store)
            && Mage::getStoreConfigFlag('converdo/analytics/token', $store)
            && $this->enabled;
    }

    /**
     * @inheritDoc
     */
    public function disabled($store = null)
    {
        return ! $this->enabled($store);
    }

    /**
     * @inheritDoc
     */
    public function terminate()
    {
        return $this->enabled = false;
    }

    /**
     * @inheritDoc
     */
    public function version($check = null)
    {
        $version = cvd_config()->version();

        return $check ? $version === $check : $version;
    }
    
    /**
     * @inheritDoc
     */
    public function website($store = null)
    {
        return (string) Mage::getStoreConfig('converdo/analytics/site', $store);
    }

    /**
     * @inheritDoc
     */
    public function user($store = null)
    {
        return Mage::getStoreConfig('converdo/analytics/token', $store);
    }

    /**
     * @inheritDoc
     */
    public function encryption($store = null)
    {
        return Mage::getStoreConfig('converdo/analytics/encryption', $store);
    }

    /**
     * @inheritDoc
     */
    public function hasActiveCart()
    {
        return (bool) Mage::getModel('checkout/cart')->getQuote()->getAllVisibleItems();
    }

    /**
     * @inheritDoc
     */
    public function getActiveCart()
    {
        return EcommerceCartFactory::build(Mage::getModel('checkout/cart'));
    }

    /**
     * @inheritDoc
     */
    public function getSearch()
    {
        return EcommerceSearchFactory::build(Mage::helper('catalogsearch'));
    }

    /**
     * @inheritDoc
     */
    public function getActiveCartProducts()
    {
        $products = [];
        
        foreach (Mage::getModel('checkout/cart')->getQuote()->getAllVisibleItems() as $product) {
            $original = Mage::getModel('catalog/product')->load($product->product_id);
            $product = EcommerceItemFactory::build($original, $product);

            if ($product->getPrice() < 0.01) {
                continue;
            }

            $products[] = $product;
        }

        return $products;
    }

    /**
     * @inheritDoc
     */
    public function getViewedProduct()
    {
        return EcommerceItemFactory::build(Mage::registry('current_product'));
    }

    /**
     * @inheritDoc
     */
    public function getViewedCategory()
    {
        return EcommerceCategoryFactory::build(Mage::registry('current_category'));
    }

    /**
     * @inheritDoc
     */
    public function getActionName()
    {
        return Mage::app()->getFrontController()->getAction()->getFullActionName();
    }

    /**
     * @inheritDoc
     */
    public function getRouteName()
    {
        return Mage::app()->getFrontController()->getRequest()->getRouteName();
    }

    /**
     * @inheritDoc
     */
    public function isSearchPage()
    {
        return Mage::app()->getFrontController()->getRequest()->getControllerName() === 'result';
    }

    /**
     * @inheritDoc
     */
    public function isProductPage()
    {
        return Mage::app()->getFrontController()->getRequest()->getControllerName() === 'product'
            && Mage::registry('current_product');
    }

    /**
     * @inheritDoc
     */
    public function isCategoryPage()
    {
        return Mage::app()->getFrontController()->getRequest()->getControllerName() === 'category'
            && Mage::registry('current_category');
    }
    
    /**
     * @inheritDoc
     */
    public function bindings()
    {
        return cvd_app(Bindings::class)->toArray('map');
    }

    /**
     * @inheritDoc
     */
    public function directory()
    {
        return 'Magento';
    }

    /**
     * @inheritDoc
     */
    public function getPageSubType()
    {
        if ($this->getRouteName() === 'cms' && $this->getPageType() === 'cms_index_index') {
            return PageTypes::PAGE_HOMEPAGE;
        }

        return $this->getRouteName();
    }
}