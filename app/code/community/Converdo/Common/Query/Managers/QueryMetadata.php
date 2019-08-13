<?php

namespace Converdo\Common\Query\Managers;

use Converdo\Common\Support\HasParameters;

class QueryMetadata
{
    use HasParameters;

    /**
     * Returns all Query metadata as JSON string.
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->all());
    }

    /**
     * Returns all Query metadata as encrypted JSON string.
     *
     * @return string
     */
    public function toEncryptedJsonString()
    {
        return cvd_config()->crypt()->encrypt($this->toJson());
    }
}