<?php

class Converdo_Analytics_Models_CategoryView
{
    use Converdo_Analytics_Support_Arrayable;

    /**
     * @var string
     */
    protected $category;

    /**
     * Sets the Category Name.
     *
     * @param  string       $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Gets the Category Name.
     *
     * @return string
     */
    public function getCategory()
    {
        return (string) $this->category;
    }

    /**
     * Gets whether the Category Name is set.
     *
     * @return bool
     */
    public function hasCategory()
    {
        return (bool) $this->category;
    }

    /**
     * Returns the data as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            "_paq.push(['setEcommerceView', false, false, '" . $this->getCategory() . "']);",
        ];
    }
}