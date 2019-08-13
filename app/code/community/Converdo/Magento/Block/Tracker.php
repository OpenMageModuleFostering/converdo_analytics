<?php

require_once __DIR__ . '/../../Common/bootstrap.php';

use Converdo\Common\Query\Managers\QueryManager;
use Converdo\Common\Query\Queries\SiteId;
use Converdo\Common\Query\Queries\TrackerUrl;
use Converdo\Common\Query\Queries\TrackSiteSearch;
use Converdo\Common\Query\Queries\CategoryView;
use Converdo\Common\Query\Queries\EcommerceView;
use Converdo\Common\Query\Queries\AddEcommerceItem;
use Converdo\Common\Query\Queries\TrackEcommerceCart;
use Converdo\Common\Query\Queries\TrackPageView;
use Converdo\Common\Query\Queries\EnableLinkTracking;
use Converdo\Common\Query\Queries\EnableHeartBeatTimer;
use Converdo\Common\Query\Queries\CustomVariable;

class Converdo_Magento_Block_Tracker extends Mage_Core_Block_Template
{
    /**
     * @var array
     */
    protected $orderedIds = [];

    /**
     * Render Converdo tracking scripts
     *
     * @return string
     */
    protected function trackers()
    {
        if (cvd_config()->platform()->disabled()) {
            return null;
        }

        QueryManager::register(cvd_app(SiteId::class));
        QueryManager::register(cvd_app(TrackerUrl::class));
        QueryManager::register(cvd_app(TrackSiteSearch::class));
        QueryManager::register(cvd_app(CategoryView::class));
        QueryManager::register(cvd_app(EcommerceView::class));
        QueryManager::register(cvd_app(AddEcommerceItem::class));
        QueryManager::register(cvd_app(TrackEcommerceCart::class));
        QueryManager::register(cvd_app(TrackPageView::class));
        QueryManager::register(cvd_app(EnableLinkTracking::class));
        QueryManager::register(cvd_app(EnableHeartBeatTimer::class));
        QueryManager::register(cvd_app(CustomVariable::class));

        foreach (QueryManager::registered() as $query) {
            if (! $query->responsible()) {
                continue;
            }

            $query->process();

            $query->parse();

            QueryManager::push($query->position(), $query);
        }

        echo QueryManager::render();
    }

    /**
     * Renders the queries as strings, only for development.
     */
    protected function debugbar()
    {
        if (! cvd_config()->environment('development')) {
            return;
        }

        dump(array_values(QueryManager::parsed()));
    }
}
