<?php

class Converdo_Tracker_Query_CategoryView extends Converdo_Tracker_Query_AbstractQuery
{
    /**
     * Get the view.
     *
     * @return mixed
     */
    public function getView()
    {
        return 'setEcommerceView';
    }

    /**
     * Get the data.
     *
     * @return array
     */
    public function getData()
    {
        if (!($this->entity instanceof Mage_Catalog_Model_Category)) {
            return [];
        }

        return [
            0   => false,
            1   => false,
            2   => $this->entity->getName(),
        ];
    }
}