<?php

$dependencies = [
    'openssl',
    'curl',
];

foreach ($dependencies as $dependency) {
    if (! extension_loaded($dependency)) {
        return false;
    }
}