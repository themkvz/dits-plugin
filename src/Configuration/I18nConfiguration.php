<?php

namespace Dits\PluginNamespace\Configuration;

use Dits\PluginNamespace\DependencyInjection\Container;
use Dits\PluginNamespace\I18n;

class I18nConfiguration implements ConfigurationInterface {

    /**
     * @inheritDoc
     */
    public function modify( Container $container ) {
        $container['i18n'] = $container->service( function ( Container $container ) {
            return new I18n( $container['plugin_domain'], $container['plugin_dir'] );
        } );
    }
}
