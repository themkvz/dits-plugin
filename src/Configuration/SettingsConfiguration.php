<?php

namespace Dits\PluginNamespace\Configuration;

use Dits\PluginNamespace\Admin\Settings;
use Dits\PluginNamespace\DependencyInjection\Container;

class SettingsConfiguration implements ConfigurationInterface {

    /**
     * @inheritDoc
     */
    public function modify( Container $container ) {
        $container['settings'] = $container->service( function ( Container $container ) {
            return new Settings( $container['view'], $container['plugin_dir'] );
        } );
    }
}
