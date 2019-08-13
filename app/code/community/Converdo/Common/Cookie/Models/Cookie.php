<?php

namespace Converdo\Common\Cookie\Models;

use Converdo\Common\Cookie\Models\Contracts\CookieInterface;

class Cookie implements CookieInterface
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
     * @inheritDoc
     */
    public function setVisitor($visitor)
    {
        $this->visitor = $visitor;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getVisitor()
    {
        return (string) $this->visitor;
    }

    /**
     * @inheritDoc
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getUuid()
    {
        return (int) $this->uuid;
    }

    /**
     * @inheritDoc
     */
    public function setVisitCount($visitCount)
    {
        $this->visitCount = $visitCount;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getVisitCount()
    {
        return (int) $this->visitCount;
    }

    /**
     * @inheritDoc
     */
    public function setLastVisitedAt($lastVisitedAt)
    {
        $this->lastVisitedAt = $lastVisitedAt;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getLastVisitedAt()
    {
        return (int) $this->lastVisitedAt;
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return (int) $this->createdAt;
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt()
    {
        return (int) $this->updatedAt;
    }

    /**
     * @inheritDoc
     */
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