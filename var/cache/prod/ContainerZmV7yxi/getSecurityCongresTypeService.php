<?php

namespace ContainerZmV7yxi;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurityCongresTypeService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Form\Front\SecurityCongresType' shared autowired service.
     *
     * @return \App\Form\Front\SecurityCongresType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/src/Form/Front/SecurityCongresType.php';

        return $container->privates['App\\Form\\Front\\SecurityCongresType'] = new \App\Form\Front\SecurityCongresType();
    }
}
