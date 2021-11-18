<?php

namespace Dits\PluginNamespace\Rest;

use WP_REST_Request;

class ExampleRoute extends AbstractRoute {
    /**
     * Constructor.
     */
    public function __construct() {}

    /**
     * @inheritdoc
     */
    public function get_path(): string {
        return 'example';
    }

    /**
     * @inheritdoc
     */
    public function permission(): bool {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function get_arguments(): array {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function get_methods(): string {
        return 'GET';
    }

    /**
     * @inheritdoc
     */
    public function respond( WP_REST_Request $request ): OkResponse {
        $data = 'example data';

        return new OkResponse( $data, 'example message' );
    }
}
