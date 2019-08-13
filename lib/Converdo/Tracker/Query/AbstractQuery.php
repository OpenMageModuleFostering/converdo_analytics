<?php

abstract class Converdo_Tracker_Query_AbstractQuery implements Converdo_Tracker_Query_Interface_QueryInterface
{
    /**
     * @var Varien_Object
     */
    protected $entity;

    /**
     * Pass an entity to the query.
     *
     * @param Varien_Object $entity
     * @return void
     */
    public function setEntity(Varien_Object $entity)
    {
        $this->entity = $entity;
    }

    /**
     * Get the data.
     *
     * @return array
     */
    public function getData()
    {
        return [];
    }
}