<?php

namespace Converdo\Common\Config;

use Converdo\Common\Config\Contracts\PlatformConfigurationContract;
use Converdo\Common\Page\Support\Contracts\RouteResolverInterface;
use Converdo\Common\Security\Crypt;

class Configuration
{
    /**
     * The Converdo Analytics plugin version.
     *
     * @var string
     */
    const VERSION = '2.1.5.57';

    /**
     * The Converdo Analytics URL.
     *
     * @var string
     */
    const TRACKER_URL = '//tracker.converdo.com/';

    /**
     * The development debug options.
     *
     * @var array
     */
    protected $environment = [];

    /**
     * The absolute path to root of the platform.
     *
     * @var string
     */
    protected $basePath;

    /**
     * The absolute path to the plugin.
     *
     * @var string
     */
    protected $path;

    /**
     * The PlatformConfiguration.
     *
     * @var PlatformConfigurationContract
     */
    protected $platform;

    /**
     * Configuration constructor.
     */
    public function __construct()
    {
        if (defined('MAGENTO_ROOT')) {
            $this->platform = cvd_app(\Converdo\Magento\Config\Configuration::class);
            $this->basePath = MAGENTO_ROOT;
            $this->path = realpath($this->basePath . '/app/code/community/Converdo');
        }

        if (defined('WC_ABSPATH')) {
            // TODO: WooCommerce
        }


        $this->resolveBindings();

        $this->resolveEnvironment();
    }

    /**
     * Returns the version number of the plugin.
     *
     * @return string
     */
    public function version()
    {
        return self::VERSION;
    }

    /**
     * Returns the tracker url.
     *
     * @param  null|string      $path
     * @return string
     */
    public function url($path = null)
    {
        $url = $this->environment['tracker_url'];

        if ($path) {
            $url = $url . $path;
        }

        return $url;
    }

    /**
     * Returns the environment of the plugin.
     *
     * @param  null|string      $check
     * @return bool|string
     */
    public function environment($check = null)
    {
        if ($check) {
            return $this->environment['name'] === $check;
        }

        return $this->environment;
    }

    /**
     * Returns the platform-specific configuration.
     *
     * @return PlatformConfigurationContract|null
     */
    public function platform()
    {
        return $this->platform;
    }

    /**
     * Returns the protocol to use for API requests.
     *
     * @return string
     */
    public function protocol()
    {
        return $this->environment['protocol'];
    }


    protected function resolveBindings()
    {
        cvd_app()->bindArray($this->platform()->bindings());
    }

    /**
     * Resolves the environment of the plugin.
     *
     * @return array
     */
    protected function resolveEnvironment()
    {
        if (file_exists($this->basePath . '/converdoanalytics-environment.php')) {
            $this->environment = include($this->basePath . '/converdoanalytics-environment.php');
        } else {
            $this->environment = include($this->path . '/Common/config.php');
        }
    }

    /**
     * Returns the Crypt instance.
     *
     * @return Crypt
     */
    public function crypt()
    {
        return cvd_app(Crypt::class);
    }

    /**
     * Returns the route resolver.
     *
     * @return RouteResolverInterface
     */
    public function route()
    {
        return cvd_app()->resolve(RouteResolverInterface::class);
    }
}
