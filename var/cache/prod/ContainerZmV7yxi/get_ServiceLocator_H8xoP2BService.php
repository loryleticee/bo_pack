<?php

namespace ContainerZmV7yxi;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_H8xoP2BService extends App_KernelProdContainer
{
    /*
     * Gets the private '.service_locator.h8xoP2B' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.h8xoP2B'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'entity' => ['privates', '.errored..service_locator.h8xoP2B.App\\Entity\\CategoryUser', NULL, 'Cannot autowire service ".service_locator.h8xoP2B": it references class "App\\Entity\\CategoryUser" but no such service exists.'],
        ], [
            'entity' => 'App\\Entity\\CategoryUser',
        ]);
    }
}
