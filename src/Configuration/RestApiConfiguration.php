<?php

namespace Dits\PluginNamespace\Configuration;

use Dits\PluginNamespace\DependencyInjection\Container;
use Dits\PluginNamespace\Rest\ExampleRoute;
use Dits\PluginNamespace\Rest\RestApi;

class RestApiConfiguration implements ConfigurationInterface {

    public function modify( Container $container ) {
        $container['rest'] = $container->service( function ( Container $container ) {
            $routes = [
                new ExampleRoute()
            ];

            return new RestApi( $container['plugin_dir'], $routes );
        } );
    }
}
