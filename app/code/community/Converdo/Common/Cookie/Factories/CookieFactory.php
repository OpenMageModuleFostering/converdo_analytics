<?php

namespace Converdo\Common\Cookie\Factories;

use Converdo\Common\Cookie\Models\Contracts\CookieInterface;
use Converdo\Common\Cookie\Models\Cookie;

class CookieFactory
{
    /**
     * @param  array            $values
     * @return CookieInterface
     */
    public static function build(array $values)
    {
        return (new Cookie())
                    ->setVisitor($values[0])
                    ->setUuid($values[1])
                    ->setCreatedAt($values[2])
                    ->setVisitCount($values[3])
                    ->setUpdatedAt($values[4])
                    ->setLastVisitedAt($values[5])
                    ->setLastEcommerceOrderCreatedAt($values[6])
            ;
    }
}