<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\Controller\admin\DocumentController' shared autowired service.

include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'ControllerTrait.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'AbstractController.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'admin'.\DIRECTORY_SEPARATOR.'DocumentController.php';

$this->services['App\\Controller\\admin\\DocumentController'] = $instance = new \App\Controller\admin\DocumentController(($this->privates['App\\Manager\\CongresManager'] ?? $this->load('getCongresManagerService.php')), ($this->privates['App\\Manager\\DocumentManager'] ?? $this->load('getDocumentManagerService.php')), ($this->services['doctrine.orm.default_entity_manager'] ?? $this->getDoctrine_Orm_DefaultEntityManagerService()), ($this->services['security.password_encoder'] ?? $this->load('getSecurity_PasswordEncoderService.php')));

$instance->setContainer(($this->privates['.service_locator.vdmMuyE'] ?? $this->load('get_ServiceLocator_VdmMuyEService.php'))->withContext('App\\Controller\\admin\\DocumentController', $this));

return $instance;
