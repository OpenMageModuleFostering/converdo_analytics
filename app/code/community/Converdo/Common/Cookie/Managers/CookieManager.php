<?php

namespace Converdo\Common\Cookie\Managers;

use Converdo\Common\Cookie\Factories\CookieFactory;
use Converdo\Common\Cookie\Models\Contracts\CookieInterface;

class CookieManager
{
    /**
     * @var string|null
     */
    protected static $name = null;

    /**
     * @var CookieInterface|null
     */
    protected static $cookie = null;

    /**
     * Finds the Converdo Analytics cookie.
     *
     * @return CookieInterface|null;
     */
    public static function find()
    {
        if (self::$cookie) {
            return self::$cookie;
        }

        foreach ($_COOKIE as $key => $cookie) {
            if (strpos($key, '_pk_id_' . cvd_config()->platform()->website()) === false) {
                continue;
            }

            $values = explode('.', $cookie);

            self::$name = str_replace('.pk.id', '_pk_id', str_replace('_', '.', $key));
            self::$cookie = CookieFactory::build($values);

            return self::$cookie;
        }

        return null;
    }

    /**
     * Updates the cookie after a completed cart.
     */
    public static function logEcommerce()
    {
        self::$cookie->setLastVisitedAt(time());
        self::$cookie->setUpdatedAt(time());

        self::update();
    }

    /**
     * Updates the cookie with new values.
     */
    protected static function update()
    {
        setcookie(self::$name, self::$cookie, time() + (86400 * 30), "/");
    }
}