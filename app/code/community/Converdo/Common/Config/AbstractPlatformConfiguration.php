<?php

namespace Converdo\Common\Config;

use Converdo\Common\Config\Contracts\PlatformConfigurationContract;
use Converdo\Common\Page\Support\PageTypes;

abstract class AbstractPlatformConfiguration implements PlatformConfigurationContract
{
    /**
     * @inheritDoc
     */
    public function getPageType()
    {
        return $this->getRouteName();
    }

    /**
     * @inheritDoc
     */
    public function getPageSubType()
    {
        return $this->getActionName();
    }

    /**
     * @inheritDoc
     */
    public function resolvePageTypes($pageType, $pageSubType)
    {
        if ($pageType === PageTypes::PAGE_ADMIN && $pageSubType === PageTypes::HOMEPAGE_VIEW) {
            $pageType = PageTypes::PAGE_HOMEPAGE;
        }

        return [
            'pt1' => $pageType,
            'pt2' => $pageSubType,
        ];
    }
}