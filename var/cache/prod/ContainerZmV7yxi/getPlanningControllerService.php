<?php

namespace ContainerZmV7yxi;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getPlanningControllerService extends App_KernelProdContainer
{
    /*
     * Gets the public 'App\Controller\PlanningController' shared autowired service.
     *
     * @return \App\Controller\PlanningController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/PlanningController.php';

        $container->services['App\\Controller\\PlanningController'] = $instance = new \App\Controller\PlanningController(($container->privates['App\\Manager\\CongresManager'] ?? $container->load('getCongresManagerService')), ($container->privates['App\\Manager\\UserManager'] ?? $container->load('getUserManagerService')), ($container->privates['App\\Manager\\MeetingManager'] ?? $container->load('getMeetingManagerService')), ($container->services['doctrine.orm.default_entity_manager'] ?? $container->load('getDoctrine_Orm_DefaultEntityManagerService')));

        $instance->setContainer(($container->privates['.service_locator.g9CqTPp'] ?? $container->load('get_ServiceLocator_G9CqTPpService'))->withContext('App\\Controller\\PlanningController', $container));

        return $instance;
    }
}
