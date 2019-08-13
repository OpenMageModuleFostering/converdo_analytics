<?php

namespace Converdo\Magento\Page;

use Converdo\Common\Page\Support\PageTypes;
use Converdo\Common\Page\Support\Contracts\RouteResolverInterface;

class RouteResolver extends PageTypes implements RouteResolverInterface
{
    /**
     * Maps the Magento routes to normalized names.
     *
     * @var array
     */
    protected $map = [
        PageTypes::PAGE_ACCOUNT => [
            'customer_account_login' => PageTypes::ACCOUNT_LOGIN,
            'customer_account_logoutSuccess' => PageTypes::ACCOUNT_LOGOUT,
            'customer_account_create' => PageTypes::ACCOUNT_CREATE,
            'customer_account_index' => PageTypes::ACCOUNT_INDEX,
            'customer_account_forgotpassword' => PageTypes::ACCOUNT_PASSWORD_FORGOT,
            'customer_account_edit' => PageTypes::ACCOUNT_EDIT_INFO,
            'customer_address_form' => PageTypes::ACCOUNT_EDIT_ADDRESS,
            'sales_order_history' => PageTypes::ACCOUNT_ORDERS,
            'sales_billing_agreement_index' => PageTypes::ACCOUNT_BILLING_AGREEMENT,
            'sales_recurring_profile_index' => PageTypes::ACCOUNT_RECURRING,
            'review_customer_index' => PageTypes::ACCOUNT_REVIEWS,
            'wishlist_index_index' => PageTypes::ACCOUNT_WISHLIST,
            'oauth_customer_token_index' => PageTypes::ACCOUNT_APPS,
            'newsletter_manage_index' => PageTypes::ACCOUNT_NEWSLETTER_MANAGE,
            'account_newsletters' => PageTypes::ACCOUNT_NEWSLETTER,
            'downloadable_customer_products' => PageTypes::ACCOUNT_DOWNLOADS,
        ],

        PageTypes::PAGE_CART => [
            'cart_index' => PageTypes::CART_VIEW,
        ],

        PageTypes::PAGE_CATEGORY => [
            'catalog_category_view' => PageTypes::CATEGORY_VIEW,
        ],

        PageTypes::PAGE_CHECKOUT => [
            'checkout_onepage_index' => PageTypes::CHECKOUT_VIEW,
            'firecheckout_index_index' => PageTypes::CHECKOUT_VIEW,
            'aw_onestepcheckout_index_index' => PageTypes::CHECKOUT_VIEW,
            'opc_index_index' => PageTypes::CHECKOUT_VIEW,
            'gomage_checkout_onepage_index' => PageTypes::CHECKOUT_VIEW,
            'anattadesign_awesomecheckout_onepage_index' => PageTypes::CHECKOUT_VIEW,
            'checkout_onestep_index' => PageTypes::CHECKOUT_VIEW,
            'onestepcheckout_index_index' => PageTypes::CHECKOUT_VIEW,
        ],

        PageTypes::PAGE_ADMIN => [
            'cms_page_view' => PageTypes::ADMIN_VIEW,
            'cms_index_index' => PageTypes::HOMEPAGE_VIEW,
        ],

        PageTypes::PAGE_CONTACT => [
            'contact_index' => PageTypes::CONTACT_VIEW,
        ],

        PageTypes::PAGE_HOMEPAGE => [
            'homepage_index' => PageTypes::HOMEPAGE_VIEW,
        ],

        PageTypes::PAGE_PRODUCT => [
            'catalog_product_view' => PageTypes::PRODUCT_VIEW,
        ],
    ];
}