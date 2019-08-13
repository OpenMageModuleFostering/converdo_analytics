<?php

interface Converdo_Tracker_Query_Interface_QueryInterface
{
    /**
     * Get the view.
     *
     * @return mixed
     */
    public function getView();

    /**
     * Get the data.
     *
     * @return array
     */
    public function getData();

    /**
     * Pass an entity to the query.
     *
     * @param Varien_Object $entity
     * @return void
     */
    public function setEntity(Varien_Object $entity);
}