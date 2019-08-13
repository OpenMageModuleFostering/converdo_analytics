<?php

class Converdo_Analytics_Models_SearchView
{
    use Converdo_Analytics_Support_Arrayable,
        Converdo_Analytics_Support_HoldsAttributes;

    /**
     * @var string
     */
    protected $keyword;

    /**
     * @var string|false
     */
    protected $category;

    /**
     * @var int
     */
    protected $results;

    /**
     * Sets the Search Keywords.
     *
     * @param  string       $keyword
     * @return $this
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * Gets the Search Keywords.
     *
     * @return bool
     */
    public function getKeyword()
    {
        return (string) $this->keyword;
    }

    /**
     * Sets the selected Category to search in, false if no Category was selected.
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
     * Gets the selected Search Category.
     *
     * @return bool
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the Search Result count.
     *
     * @param  int          $results
     * @return $this
     */
    public function setResultCount($results)
    {
        $this->results = $results;

        return $this;
    }

    /**
     * Gets the Search Keywords.
     *
     * @return bool
     */
    public function getResultCount()
    {
        return (int) $this->results;
    }

    /**
     * Returns the data as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            "_paq.push(['trackSiteSearch', '" . $this->getKeyword() . "', null, " . $this->getResultCount() . "]);",
        ];
    }
}