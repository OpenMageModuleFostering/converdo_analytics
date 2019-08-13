<?php

namespace Converdo\Magento\Container;

use Converdo\Common\Config\Contracts\PlatformConfigurationContract;
use Converdo\Common\Log\LoggerInterface;
use Converdo\Common\Page\Support\Contracts\RouteResolverInterface;
use Converdo\Common\Support\Arrayable;
use Converdo\Magento\Config\Configuration;
use Converdo\Magento\Log\Logger;
use Converdo\Magento\Page\RouteResolver;

class Bindings
{
    use Arrayable;

    /**
     * Defines all bindings.
     *
     * @var array
     */
    protected $map = [
        RouteResolverInterface::class => RouteResolver::class,
        PlatformConfigurationContract::class => Configuration::class,
        LoggerInterface::class => Logger::class,
    ];
}