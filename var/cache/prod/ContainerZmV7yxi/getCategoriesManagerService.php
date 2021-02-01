<?php

namespace ContainerZmV7yxi;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCategoriesManagerService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Manager\CategoriesManager' shared autowired service.
     *
     * @return \App\Manager\CategoriesManager
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Manager/CategoriesManager.php';

        return $container->privates['App\\Manager\\CategoriesManager'] = new \App\Manager\CategoriesManager(($container->services['doctrine'] ?? $container->getDoctrineService()));
    }
}
