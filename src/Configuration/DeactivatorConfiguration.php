<?php

namespace Dits\PluginNamespace\Configuration;

use Dits\PluginNamespace\Deactivator;
use Dits\PluginNamespace\DependencyInjection\Container;

class DeactivatorConfiguration implements ConfigurationInterface {

    /**
     * @inheritdoc
     */
    public function modify( Container $container ) {
        $container['deactivator'] = $container->service( function ( Container $container ) {
            return new Deactivator();
        } );
    }
}
