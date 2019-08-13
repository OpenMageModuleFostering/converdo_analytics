<?php

namespace Converdo\Common\Config\Contracts;

use Converdo\Common\Query\Models\Contracts\EcommerceCartInterface;
use Converdo\Common\Query\Models\Contracts\EcommerceItemInterface;
use Converdo\Common\Query\Models\Contracts\EcommerceCategoryInterface;
use Converdo\Common\Query\Models\Contracts\EcommerceSearchInterface;

interface PlatformConfigurationContract
{
    /**
     * Returns whether the plugin is enabled.
     *
     * @param  mixed            $store
     * @return bool
     */
    public function enabled($store = null);

    /**
     * Returns whether the plugin is disabled.
     *
     * @param  mixed            $store
     * @return bool
     */
    public function disabled($store = null);

    /**
     * Forces the plugin to disabled mode.
     *
     * @return bool
     */
    public function terminate();

    /**
     * Returns the version, or checks if the version matches.
     *
     * @param  string|null      $check
     * @return string
     */
    public function version($check = null);
    
    /**
     * Returns the website token.
     *
     * @param  mixed            $store
     * @return string
     */
    public function website($store = null);

    /**
     * Returns the user token.
     *
     * @param  mixed            $store
     * @return string
     */
    public function user($store = null);

    /**
     * Returns the encryption token.
     *
     * @param  mixed            $store
     * @return string
     */
    public function encryption($store = null);

    /**
     * Returns whether the current visitor has a cart.
     *
     * @return bool
     */
    public function hasActiveCart();

    /**
     * Returns the cart of the current visitor.
     *
     * @return EcommerceCartInterface
     */
    public function getActiveCart();

    /**
     * Returns the cart products of the current visitor.
     *
     * @return EcommerceItemInterface[]
     */
    public function getActiveCartProducts();

    /**
     * Returns the product seen by the current visitor.
     *
     * @return EcommerceItemInterface
     */
    public function getViewedProduct();

    /**
     * Returns the product seen by the current visitor.
     *
     * @return EcommerceCategoryInterface
     */
    public function getViewedCategory();

    /**
     * Returns the EcommerceSearchInterface associated with the current search query.
     *
     * @return EcommerceSearchInterface
     */
    public function getSearch();

    /**
     * Returns the name of the current controller method.
     *
     * @return string
     */
    public function getActionName();

    /**
     * Returns the name of the current route.
     *
     * @return string
     */
    public function getRouteName();

    /**
     * Returns whether the current page is a search page.
     *
     * @return bool
     */
    public function isSearchPage();

    /**
     * Returns whether the current page is a category page.
     *
     * @return bool
     */
    public function isCategoryPage();

    /**
     * Returns whether the current page is a product page.
     *
     * @return bool
     */
    public function isProductPage();

    /**
     * Returns all defined interface bindings.
     *
     * @return array
     */
    public function bindings();
}