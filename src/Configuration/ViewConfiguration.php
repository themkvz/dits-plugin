<?php

namespace Dits\PluginNamespace\Configuration;

use Dits\PluginNamespace\DependencyInjection\Container;
use Dits\PluginNamespace\View;

class ViewConfiguration implements ConfigurationInterface {

    /**
     * @inheritDoc
     */
    public function modify( Container $container ) {
        $container['view'] = $container->service( function ( Container $container ) {
            return new View( $container['plugin_path'] );
        } );
    }
}
