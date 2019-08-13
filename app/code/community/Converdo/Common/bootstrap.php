<?php

$autoload = require_once __DIR__ . '/autoload.php';

$functions = require_once __DIR__ . '/functions.php';

$dependencies = require_once __DIR__ . '/dependencies.php';

$config = cvd_config();

if (! $autoload || ! $dependencies) {
    cvd_config()->platform()->terminate();
}

\Converdo\Common\Input\InputManager::read();