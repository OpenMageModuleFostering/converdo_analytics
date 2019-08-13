<?php

/**
 * Class Converdo_Entity_Product
 */
class Converdo_Entity_Product extends Converdo_Entity_AbstractEntity implements Converdo_Entity_Interface_ProductInterface
{
    /**
     * @var Mage_Catalog_Model_Product
     */
    public $entity;

    /**
     * Converdo_Entity_Product constructor.
     * @param Mage_Core_Model_Abstract $product
     */
    public function __construct(Mage_Core_Model_Abstract $product)
    {
        $this->entity = $product;
    }

    /**
     * Get the product id.
     *
     * @return int
     */
    public function getId()
    {
        return (int) $this->entity->getId();
    }

    /**
     * Get the parent product id.
     *
     * @return int
     */
    public function getParentId()
    {
        return (int) $this->entity->getTypeInstance()->getParentIdsByChild($this->getId());
    }

    /**
     * Get the children product id.
     *
     * @return int
     */
    public function getChildrenId()
    {
        return (int) $this->entity->getTypeInstance()->getChildrenIds($this->getId());
    }

    /**
     * Get the product name.
     *
     * @return string
     */
    public function getName()
    {
        return (string) addslashes($this->entity->getName());
    }

    /**
     * Get the product SKU.
     *
     * @return string
     */
    public function getSku()
    {
        return (string) $this->entity->getSku();
    }

    /**
     * Get the product price.
     *
     * @return float
     */
    public function getPrice()
    {
        return number_format((float) $this->entity->getPrice(), 2);
    }

    /**
     * Get the product status.
     *
     * @return bool
     */
    public function getStatus()
    {
        return (bool) $this->entity->getStatus();
    }

    /**
     * Get the product image url.
     *
     * @return string
     */
    public function getImageUrl()
    {
        return (string) $this->entity->getImageUrl();
    }

    /**
     * Get whether the product is in stock.
     *
     * @return bool
     */
    public function isInStock()
    {
        return (bool) $this->entity->isInStock();
    }

    /**
     * Get the product stock amount.
     *
     * @return int
     */
    public function getStockQuantity()
    {
        return (float) Mage::getModel('cataloginventory/stock_item')->loadByProduct($this->getId())->getQty();
    }

    /**
     * Get the ordered quantity amount.
     *
     * @return float
     */
    public function getQuantityOrdered()
    {
        return number_format($this->entity->getQtyOrdered(), 0, '.', '') ?: 0;
    }

    /**
     * Get the quantity amount.
     *
     * @return float
     */
    public function getQuantity()
    {
        return (float) $this->entity->getQty();
    }

    /**
     * Get the product type.
     *
     * @return int
     */
    public function getType()
    {
        return (int) $this->entity->getTypeId();
    }

    /**
     * Get the visibilities of the product.
     *
     * @return array
     */
    public function getVisibilities()
    {
        return [
            'search'    => $this->entity->isVisibleInSiteVisibility(),
            'catalog'   => $this->entity->isVisibleInCatalog(),
        ];
    }

    /**
     * Get the current category of the product.
     *
     * @return Mage_Catalog_Model_Category
     */
    public function getCategory()
    {
        return $this->entity->getCategory();
    }

    /**
     * Get the current category tree of the product.
     *
     * @return Varien_Data_Collection
     */
    public function getCategories()
    {
        return $this->entity->getCategoryCollection();
    }

    /**
     * Get the ids of the category tree of the product.
     *
     * @return array
     */
    public function getCategoryIds()
    {
        return (array) $this->entity->getCategoryIds();
    }

    /**
     * Get the product's brand.
     *
     * @return bool
     */
    public function getBrand()
    {
        return $this->entity->getAttributeText('manufacturer');
    }

    /**
     * Get the attributes of the product.
     *
     * @return array
     */
    public function getAttributes()
    {
        return Mage::getModel('eav/entity_attribute_set')->load($this->entity->getAttributeSetId())->getAttributeSetName();
    }
}