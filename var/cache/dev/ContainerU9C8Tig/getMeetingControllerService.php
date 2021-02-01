<?php

namespace ContainerU9C8Tig;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMeetingControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\MeetingController' shared autowired service.
     *
     * @return \App\Controller\MeetingController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/MeetingController.php';

        $container->services['App\\Controller\\MeetingController'] = $instance = new \App\Controller\MeetingController(($container->privates['App\\Manager\\CongresManager'] ?? $container->load('getCongresManagerService')), ($container->privates['App\\Manager\\UserManager'] ?? $container->load('getUserManagerService')), ($container->privates['App\\Manager\\MeetingManager'] ?? $container->load('getMeetingManagerService')), ($container->privates['App\\Manager\\DocumentManager'] ?? $container->load('getDocumentManagerService')), ($container->services['session'] ?? $container->load('getSessionService')), ($container->services['doctrine.orm.default_entity_manager'] ?? $container->getDoctrine_Orm_DefaultEntityManagerService()));

        $instance->setContainer(($container->privates['.service_locator.g9CqTPp'] ?? $container->load('get_ServiceLocator_G9CqTPpService'))->withContext('App\\Controller\\MeetingController', $container));

        return $instance;
    }
}
