<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.etJ_SHU' shared service.

return $this->privates['.service_locator.etJ_SHU'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'crypt' => ['privates', 'App\\Service\\Crypt', 'getCryptService.php', true],
], [
    'crypt' => 'App\\Service\\Crypt',
]);
