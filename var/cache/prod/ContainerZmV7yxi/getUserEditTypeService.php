<?php

namespace ContainerZmV7yxi;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserEditTypeService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Form\Back\UserEditType' shared autowired service.
     *
     * @return \App\Form\Back\UserEditType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/src/Form/Back/UserEditType.php';

        return $container->privates['App\\Form\\Back\\UserEditType'] = new \App\Form\Back\UserEditType();
    }
}
