<?php

class Converdo_Tracker_Query_EcommerceCartUpdate extends Converdo_Tracker_Query_AbstractQuery
{
    public function getView()
    {
        return 'trackEcommerceCartUpdate';
    }

    public function getData()
    {
        if (!($this->entity instanceof Varien_Object)) {
            return [];
        }

        return [
            0 => number_format($this->entity->getQuote()->getGrandTotal(), 2),
        ];
    }
}