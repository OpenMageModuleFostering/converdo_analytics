<?php

// Include the Converdo functions.
$functions = require_once __DIR__ . '/functions.php';

// Autoload all Converdo files and files of the current platform.
$autoload = require_once __DIR__ . '/autoload.php';
$autoload_platform = require_once __DIR__ . '/../Magento/autoload.php';

foreach (array_merge($autoload, (array) $autoload_platform) as $class) {
    if (realpath(dirname(__DIR__) . $class . '.php')) {
        require_once dirname(__DIR__) . $class . '.php';
    }
}

// Terminate plugin if some required dependencies are missing.
$dependencies = require_once __DIR__ . '/dependencies.php';

if (count($dependencies) !== 0) {
    cvd_logger()->critical("The required dependencies are missing: " . implode(', ', $dependencies));

    cvd_config()->platform()->terminate();
}

// Initialize the InputManager.
\Converdo\Common\Input\InputManager::read();