<?php

namespace Converdo\Common\Page\Support\Contracts;

use Converdo\Common\Page\Models\Contracts\PageInterface;

interface RouteResolverInterface
{
    /**
     * Resolves the current route.
     *
     * @return PageInterface
     */
    public function current();
}