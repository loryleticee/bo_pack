<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'webpack_encore.tag_renderer' shared service.

include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'webpack-encore-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Asset'.\DIRECTORY_SEPARATOR.'TagRenderer.php';

return $this->privates['webpack_encore.tag_renderer'] = new \Symfony\WebpackEncoreBundle\Asset\TagRenderer(($this->privates['webpack_encore.entrypoint_lookup_collection'] ?? $this->load('getWebpackEncore_EntrypointLookupCollectionService.php')), ($this->privates['assets.packages'] ?? $this->getAssets_PackagesService()), [], [], [], ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));
