<?php

/**
 * Class Converdo_Tracker_Page_AbstractPage
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 */
class Converdo_Tracker_Page_Customer extends Converdo_Tracker_Page_AbstractPage
{
    /**
     * @inheritdoc
     * @return int
     */
    public function type()
    {
        return 1;
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function types()
    {
        return [
            'customer_account_login' => 100,
            'customer_account_create' => 101,
            'customer_account_index' => 102,
            'customer_account_forgotpassword' => 103,
            'customer_account_edit' => 104,
            'customer_address_form' => 105,
            'sales_order_history' => 106,
            'sales_billing_agreement_index' => 107,
            'sales_recurring_profile_index' => 108,
            'review_customer_index' => 109,
            'wishlist_index_index' => 110,
            'oauth_customer_token_index' => 111,
            'newsletter_manage_index' => 112,
            'downloadable_customer_products' => 113,
            'customer_account_logoutSuccess' => 114,
        ];
    }
}