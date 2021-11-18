<?php

namespace Dits\PluginNamespace\Configuration;

use Dits\PluginNamespace\Admin\AdminPage;
use Dits\PluginNamespace\DependencyInjection\Container;

class AdminPageConfiguration implements ConfigurationInterface {

    /**
     * @inheritDoc
     */
    public function modify( Container $container ) {
        $container['admin_page'] = $container->service( function ( Container $container ) {
            return new AdminPage( $container['settings'], $container['view'], $container['plugin_basename'] );
        } );
    }
}
