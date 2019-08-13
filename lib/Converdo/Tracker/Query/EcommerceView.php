<?php

class Converdo_Tracker_Query_EcommerceView extends Converdo_Tracker_Query_AbstractQuery
{
    public function getView()
    {
        return 'setEcommerceView';
    }

    public function getData()
    {
        if (!($this->entity instanceof Varien_Object)) {
            return [];
        }

        return [
            0 => $this->entity->getSku(),
            1 => addslashes($this->entity->getName()),
            2 => $this->entity->getName(),
            3 => number_format($this->entity->getPrice(), 2),
            4 => number_format($this->entity->getQtyOrdered(), 0, '.', ''),
        ];
    }
}