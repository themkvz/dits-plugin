<?php

namespace Dits\PluginNamespace\Configuration;

use Dits\PluginNamespace\Activator;
use Dits\PluginNamespace\DependencyInjection\Container;

class ActivatorConfiguration implements ConfigurationInterface {

    /**
     * @inheritDoc
     */
    public function modify( Container $container ) {
        $container['activator'] = $container->service( function ( Container $container ) {
            return new Activator( $container['plugin_name'] );
        } );
    }
}
