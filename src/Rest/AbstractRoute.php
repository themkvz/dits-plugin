<?php

namespace Dits\PluginNamespace\Rest;

use WP_REST_Request;

abstract class AbstractRoute implements RouteInterface {
    /**
     * Get respond.
     *
     * @return callable
     */
    final public function get_callback(): callable {
        return [ $this, 'respond' ];
    }

    /**
     * Get permission.
     *
     * @return callable
     */
    final public function get_permission_callback(): callable {
        return [ $this, 'permission' ];
    }

    /**
     * Get permission.
     *
     * @return bool
     */
    abstract public function permission(): bool;

    /**
     * Get respond.
     *
     * @param WP_REST_Request $request
     *
     * @return mixed
     */
    abstract public function respond( WP_REST_Request $request );
}
