<?php

namespace Converdo\Common\Query\Queries;

use Converdo\Common\Query\Managers\QueryManager;

class CustomVariable extends AbstractQuery
{
    /**
     * @inheritDoc
     */
    public function process()
    {
        $this->set('configuration', QueryManager::metadata()->toEncryptedJsonString());
    }
    
    /**
     * @inheritDoc
     */
    public function parse()
    {
        QueryManager::store(
            $this->position(),
            "_paq.push(['setCustomVariable', 1, 'configuration', '{$this->get('configuration')}', 'page']);"
        );
    }

    /**
     * @inheritDoc
     */
    public function position()
    {
        return 50;
    }
}