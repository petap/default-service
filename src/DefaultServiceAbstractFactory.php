<?php

namespace Petap\DefaultService;

use Laminas\ServiceManager\Factory\AbstractFactoryInterface;
use Interop\Container\ContainerInterface;

/**
 * Class DefaultServiceAbstractFactory
 * @package Petap\DefaultService
 */
class DefaultServiceAbstractFactory implements AbstractFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        if (!is_string($requestedName)) {
            return false;
        }

        $factoryName = $requestedName . "Factory";
        if (class_exists($factoryName)) {
            return true;
        }

        return class_exists($requestedName);
    }

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $factoryName = $requestedName . "Factory";
        if (class_exists($factoryName)) {
            $factory = new $factoryName();

            return $factory($container, $requestedName, $options);
        }

        return new $requestedName();
    }
}
