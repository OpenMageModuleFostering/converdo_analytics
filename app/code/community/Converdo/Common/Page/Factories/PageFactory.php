<?php

namespace Converdo\Common\Page\Factories;

use Converdo\Common\Page\Models\Contracts\PageInterface;
use Converdo\Common\Page\Models\Page;

class PageFactory
{
    /**
     * @param  string           $type
     * @param  string           $subtype
     * @return PageInterface
     */
    public static function build($type, $subtype)
    {
        return (new Page())
                    ->setType($type)
                    ->setSubtype($subtype);
    }
}