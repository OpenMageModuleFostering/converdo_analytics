<?php

class Converdo_Tracker_Query_ProductView extends Converdo_Tracker_Query_AbstractQuery
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
        if (!($this->entity instanceof Converdo_Entity_Interface_EntityInterface)) {
            return [];
        }

        return [
            0 => $this->entity->getSku(),
            1 => $this->entity->getName(),
            3 => $this->entity->getPrice(),
        ];
    }
}