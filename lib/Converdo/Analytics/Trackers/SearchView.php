<?php

class Converdo_Analytics_Trackers_SearchView extends Converdo_Analytics_Support_AbstractTracker
{
    use Converdo_Analytics_Support_Arrayable,
        Converdo_Analytics_Support_HoldsAttributes;

    /**
     * Determines whether the Tracker is responsible during the Request.
     *
     * @return bool
     */
    public function responsible()
    {
        return Mage::app()->getFrontController()->getRequest()->getRouteName() == 'catalogsearch';
    }

    /**
     * Track data for the Request.
     *
     * @return void
     */
    public function track()
    {
        Converdo_Analytics_Tracker::searchView()
            ->setKeyword(Mage::helper('catalogsearch')->getQueryText())
            ->setCategory(false)
            ->setResultCount(
                Mage::helper('catalogsearch')
                    ->getEngine()
                    ->getResultCollection()
                    ->addSearchFilter(
                        Mage::helper('catalogsearch')
                        ->getQuery()
                        ->getQueryText())
                    ->getSize()
            );
    }

    /**
     * Returns the data as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return Converdo_Analytics_Tracker::searchView()->toArray();
    }
}