<?php

namespace Dits\PluginNamespace\Rest;

class OkResponse extends \WP_REST_Response {
    /**
     * Extend response class.
     *
     * @param null $data - Base response
     * @param string $message - Message to response
     * @param array $headers
     */
    public function __construct( $data = null, string $message = '', array $headers = [] ) {
        $data = [
          'ok' => true,
          'data' => $data,
          'message' => $message
        ];

        parent::__construct( $data, 200, $headers );
    }
}
