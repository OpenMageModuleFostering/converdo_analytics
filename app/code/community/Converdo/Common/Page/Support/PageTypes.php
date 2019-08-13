<?php

namespace Converdo\Common\Page\Support;

use Converdo\Common\Page\Factories\PageFactory;

class PageTypes
{
    const PAGE_ACCOUNT                      = 'account';
    const PAGE_CART                         = 'cart';
    const PAGE_CATEGORY                     = 'category';
    const PAGE_CHECKOUT                     = 'checkout';
    const PAGE_ADMIN                        = 'cms';
    const PAGE_CONTACT                      = 'contact';
    const PAGE_HOMEPAGE                     = 'homepage';
    const PAGE_PRODUCT                      = 'product';
    const PAGE_SEARCH                       = 'search';
    const PAGE_SUCCESS                      = 'success';

    const ACCOUNT_LOGIN                     = 'account_login';
    const ACCOUNT_CREATE                    = 'account_create';
    const ACCOUNT_INDEX                     = 'customer_account_index';
    const ACCOUNT_PASSWORD_FORGOT           = 'account_forgot_password';
    const ACCOUNT_EDIT_INFO                 = 'account_edit_info';
    const ACCOUNT_EDIT_ADDRESS              = 'account_edit_address';
    const ACCOUNT_ORDERS                    = 'account_orders';
    const ACCOUNT_BILLING_AGREEMENT         = 'account_billing_agreement';
    const ACCOUNT_RECURRING                 = 'account_recurring';
    const ACCOUNT_REVIEWS                   = 'account_reviews';
    const ACCOUNT_WISHLIST                  = 'account_wishlist';
    const ACCOUNT_APPS                      = 'account_apps';
    const ACCOUNT_NEWSLETTER_MANAGE         = 'newsletter_manage_index';
    const ACCOUNT_NEWSLETTER                = 'account_newsletters';
    const ACCOUNT_DOWNLOADS                 = 'account_downloads';
    const ACCOUNT_LOGOUT                    = 'account_logout';

    const CART_VIEW                         = 'cart_index';

    const CATEGORY_VIEW                     = 'category_view';

    const CHECKOUT_VIEW                     = 'checkout_onepage_index';

    const ADMIN_VIEW                        = 'cms_page_view';

    const CONTACT_VIEW                      = 'contact_index';

    const HOMEPAGE_VIEW                     = 'homepage_index';

    const PRODUCT_VIEW                      = 'product_view';

    /**
     * Maps the Platform routes to normalized names.
     *
     * @var array
     */
    protected $map = [];

    /**
     * @inheritDoc
     */
    public function current()
    {
        foreach ($this->map as $key => $type) {
            foreach ($type as $subkey => $page) {
                if ($subkey !== cvd_config()->platform()->getActionName()) {
                    continue;
                }

                $keys = cvd_config()->platform()->resolvePageTypes($key, $page);

                return PageFactory::build($keys['pt1'], $keys['pt2']);
            }
        }

        return PageFactory::build(
            cvd_config()->platform()->getPageType(),
            cvd_config()->platform()->getPageSubType()
        );
    }
}