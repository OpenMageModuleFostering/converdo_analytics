<?php

namespace Converdo\Common\Cookie\Models\Contracts;

interface CookieInterface
{
    /**
     * Sets the visitor ID.
     *
     * @param  string       $visitor
     * @return $this
     */
    public function setVisitor($visitor);

    /**
     * Gets the visitor ID.
     *
     * @return string
     */
    public function getVisitor();

    /**
     * Sets the uuid.
     *
     * @param  int          $uuid
     * @return $this
     */
    public function setUuid($uuid);

    /**
     * Gets the uuid.
     *
     * @return int
     */
    public function getUuid();

    /**
     * Sets the visit count.
     *
     * @param  int          $visitCount
     * @return $this
     */
    public function setVisitCount($visitCount);

    /**
     * Gets the visit count.
     *
     * @return int
     */
    public function getVisitCount();

    /**
     * Sets the last visit timestamp.
     *
     * @param  int          $lastVisitedAt
     * @return $this
     */
    public function setLastVisitedAt($lastVisitedAt);

    /**
     * Gets the last visit timestamp.
     *
     * @return int
     */
    public function getLastVisitedAt();

    /**
     * Sets the last ecommerce created timestamp.
     *
     * @param  int          $lastCreatedAt
     * @return $this
     */
    public function setLastEcommerceOrderCreatedAt($lastCreatedAt);

    /**
     * Gets the last ecommerce created timestamp.
     *
     * @return int
     */
    public function getLastEcommerceOrderCreatedAt();

    /**
     * Sets the created at timestamp.
     *
     * @param  int          $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Gets the created at timestamp.
     *
     * @return int
     */
    public function getCreatedAt();

    /**
     * Sets the updated at timestamp.
     *
     * @param  int          $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Gets the updated at timestamp.
     *
     * @return int
     */
    public function getUpdatedAt();

    /**
     * Outputs the cookie as a string.
     *
     * @return string
     */
    public function __toString();
}