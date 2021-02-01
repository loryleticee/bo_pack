<?php

namespace ContainerU9C8Tig;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_MRogL1XService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.mRogL1X' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.mRogL1X'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'reason' => ['privates', '.errored..service_locator.mRogL1X.App\\Entity\\Reason', NULL, 'Cannot autowire service ".service_locator.mRogL1X": it references class "App\\Entity\\Reason" but no such service exists.'],
        ], [
            'reason' => 'App\\Entity\\Reason',
        ]);
    }
}
