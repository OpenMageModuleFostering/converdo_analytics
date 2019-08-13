<?php

/**
 * Class Converdo_Tracker_Query_EcommerceItem
 *
 * @package     Converdo
 * @author      Marc Roosendaal <marc@converdo.nl>
 * @copyright   2016 Converdo B.V.
 * @link        https://developer.piwik.org/api-reference/tracking-javascript
 * @link        https://piwik.org/docs/ecommerce-analytics/
 */
class Converdo_Tracker_Query_EcommerceItem extends Converdo_Tracker_Query_AbstractQuery
{
    /**
     * @var Converdo_Entity_Product
     */
    protected $entity;

    /**
     * @inheritdoc
     * @return string
     */
    public function view()
    {
        return 'addEcommerceItem';
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function parameters()
    {
        return [
            0 => [Converdo_Support_QueryType::string(), $this->entities[0]->getSku()],
            1 => [Converdo_Support_QueryType::string(), $this->entities[0]->getName()],
            3 => [Converdo_Support_QueryType::float(), $this->entities[0]->getPrice()],
        ];
    }
}