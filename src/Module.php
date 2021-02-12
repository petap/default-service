<?php

namespace Petap\DefaultService;

/**
 * Class Module
 * @package Petap\DefaultService
 */
class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Laminas\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src',
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include dirname(__DIR__) . '/config/module.config.php';
    }
}

