<?php

class Converdo_Tracker_Processor_PageViewProcessor extends Converdo_Tracker_Processor_AbstractProcessor
{
    /**
     * Converdo_Tracker_Processor_ProductViewProcessor constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Process everything.
     *
     * @return void
     */
    public function process()
    {
        $this->configuration();
    }

    /**
     * Return a JSON string with configuration.
     *
     * @return array
     */
    protected function configuration()
    {
        $pageType		 	= Mage::app()->getFrontController()->getAction()->getFullActionName();
        $route		   	 	= Mage::app()->getFrontController()->getRequest()->getRouteName();

        switch (true) {

            // Account
            case ($route == 'customer'):
                $configPageType = 'account';
                if ($pageType == 'customer_account_login')
                    $configPageTypeSub = 'account_login';
                else if ($pageType == 'customer_account_create')
                    $configPageTypeSub = 'account_create';
                else if ($pageType == 'customer_account_index')
                    $configPageTypeSub = 'account_profile';
                else if ($pageType == 'customer_account_forgotpassword')
                    $configPageTypeSub = 'account_forgot_password';
                else if ($pageType == 'customer_account_edit')
                    $configPageTypeSub = 'account_edit_info';
                else if ($pageType == 'customer_address_form')
                    $configPageTypeSub = 'account_edit_address';
                else if ($pageType == 'sales_order_history')
                    $configPageTypeSub = 'account_orders';
                else if ($pageType == 'sales_billing_agreement_index')
                    $configPageTypeSub = 'account_billing_agreement';
                else if ($pageType == 'sales_recurring_profile_index')
                    $configPageTypeSub = 'account_recurring';
                else if ($pageType == 'review_customer_index')
                    $configPageTypeSub = 'account_reviews';
                else if ($pageType == 'wishlist_index_index')
                    $configPageTypeSub = 'account_wishlist';
                else if ($pageType == 'oauth_customer_token_index')
                    $configPageTypeSub = 'account_apps';
                else if ($pageType == 'newsletter_manage_index')
                    $configPageTypeSub = 'account_newsletters';
                else if ($pageType == 'downloadable_customer_products')
                    $configPageTypeSub = 'account_downloads';
                else if ($pageType == 'customer_account_logoutSuccess')
                    $configPageTypeSub = 'account_logout';
                else
                    $configPageTypeSub = (string) $pageType;
                break;

            // Cart
            case ($pageType == 'checkout_cart_index'):
                $configPageType = 'cart';
                $configPageTypeSub = 'cart_index';
                break;

            // Category
            case ($pageType == 'catalog_category_view'):
                $configPageType = 'category';
                $configPageTypeSub = 'category_view';
                break;

            // Checkout
            case ($pageType == 'checkout_onepage_index'):
                $configPageType = 'checkout';
                $configPageTypeSub = 'checkout_onepage_index';
                break;

            // CMS
            case ($pageType == 'cms_page_view'):
                $configPageType = 'cms';
                $configPageTypeSub = (string) $pageType;
                break;

            // Contact
            case ($route == 'contacts'):
                $configPageType = 'contact';
                $configPageTypeSub = 'contact_index';
                break;

            // Homepage
            case ($pageType == 'cms_index_index'):
                $configPageType = 'homepage';
                $configPageTypeSub = 'homepage_index';
                break;

            // Product
            case ($pageType == 'catalog_product_view'):
                $configPageType = 'product';
                $configPageTypeSub = 'product_view';
                break;

            // Search
            case ($route == 'catalogsearch'):
                $configPageType = 'search';
                if ($pageType == 'catalogsearch_result_index')
                    $configPageTypeSub = 'search_results';
                else if ($pageType == 'catalogsearch_advanced_index')
                    $configPageTypeSub = 'search_advanced';
                else if ($pageType == 'catalogsearch_advanced_result')
                    $configPageTypeSub = 'search_results_advanced';
                else if ($pageType == 'catalogsearch_term_popular')
                    $configPageTypeSub = 'search_terms';
                else
                    $configPageTypeSub = (string) $pageType;
                break;

            // Success
            case ($pageType == 'checkout_onepage_success'):
                $configPageType = 'success';
                $configPageTypeSub = 'success_index';
                break;

            default:
                $configPageType = (string) $route;
                $configPageTypeSub = (string) $pageType;
                break;
        }

        $this->setConfiguration([
            'pt1'   => $configPageType,
            'pt2'   => $configPageTypeSub
        ]);
    }
}