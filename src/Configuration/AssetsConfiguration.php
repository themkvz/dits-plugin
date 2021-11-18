<?php

namespace Dits\PluginNamespace\Configuration;

use Dits\PluginNamespace\Assets;
use Dits\PluginNamespace\DependencyInjection\Container;

class AssetsConfiguration implements ConfigurationInterface {

    /**
     * @inheritDoc
     */
    public function modify( Container $container ) {
        $container['assets'] = $container->service( function ( Container $container ) {
            return new Assets( $container['plugin_version'], $container['plugin_url'], $container['plugin_dir'] );
        } );
    }
}
