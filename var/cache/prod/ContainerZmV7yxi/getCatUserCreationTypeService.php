<?php

namespace ContainerZmV7yxi;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCatUserCreationTypeService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\Form\Back\CatUserCreationType' shared autowired service.
     *
     * @return \App\Form\Back\CatUserCreationType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/src/Form/Back/CatUserCreationType.php';

        return $container->privates['App\\Form\\Back\\CatUserCreationType'] = new \App\Form\Back\CatUserCreationType();
    }
}
