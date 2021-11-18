<?php

namespace Dits\PluginNamespace\Configuration;

use Dits\PluginNamespace\DependencyInjection\Container;

/**
 * A container configuration object configures a dependency injection container during the build process
 */
interface ConfigurationInterface {
    /**
     * Modifies the given dependency injection container.
     *
     * @param Container $container
     */
    public function modify( Container $container );
}
