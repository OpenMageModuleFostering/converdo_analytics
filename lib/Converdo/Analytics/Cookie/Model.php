<?php

class Converdo_Analytics_Cookie_Model
{
    /**
     * @var string
     */
    protected $visitor;

    /**
     * @var int
     */
    protected $uuid;

    /**
     * @var int
     */
    protected $visitCount;

    /**
     * @var int
     */
    protected $lastVisitedAt;

    /**
     * @var int
     */
    protected $createdAt;

    /**
     * @var int
     */
    protected $updatedAt;

    /**
     * Sets the visitor ID.
     *
     * @param  string       $visitor
     * @return $this
     */
    public function setVisitor($visitor)
    {
        $this->visitor = $visitor;

        return $this;
    }

    /**
     * Gets the visitor ID.
     *
     * @return string
     */
    public function getVisitor()
    {
        return (string) $this->visitor;
    }

    /**
     * Sets the uuid.
     *
     * @param  int          $uuid
     * @return $this
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Gets the uuid.
     *
     * @return int
     */
    public function getUuid()
    {
        return (int) $this->uuid;
    }

    /**
     * Sets the visit count.
     *
     * @param  int          $visitCount
     * @return $this
     */
    public function setVisitCount($visitCount)
    {
        $this->visitCount = $visitCount;

        return $this;
    }

    /**
     * Gets the visit count.
     *
     * @return int
     */
    public function getVisitCount()
    {
        return (int) $this->visitCount;
    }

    /**
     * Sets the last visit timestamp.
     *
     * @param  int          $lastVisitedAt
     * @return $this
     */
    public function setLastVisitedAt($lastVisitedAt)
    {
        $this->lastVisitedAt = $lastVisitedAt;

        return $this;
    }

    /**
     * Gets the last visit timestamp.
     *
     * @return int
     */
    public function getLastVisitedAt()
    {
        return (int) $this->lastVisitedAt;
    }

    /**
     * Sets the created at timestamp.
     *
     * @param  int          $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Gets the created at timestamp.
     *
     * @return int
     */
    public function getCreatedAt()
    {
        return (int) $this->createdAt;
    }

    /**
     * Sets the updated at timestamp.
     *
     * @param  int          $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Gets the updated at timestamp.
     *
     * @return int
     */
    public function getUpdatedAt()
    {
        return (int) $this->updatedAt;
    }

    public function __toString()
    {
        return implode('.', [
            $this->getVisitor(),
            $this->getUuid(),
            $this->getCreatedAt(),
            $this->getVisitCount(),
            $this->getUpdatedAt(),
            $this->getLastVisitedAt()
        ]);
    }
}