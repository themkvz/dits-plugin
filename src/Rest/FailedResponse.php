<?php

namespace Dits\PluginNamespace\Rest;

class FailedResponse extends \WP_REST_Response {
    /**
     * Extend response class.
     *
     * @param string $code - Error code
     * @param string $message - Message to response
     * @param array $headers
     */
    public function __construct( string $code = '', string $message = '', array $headers = [] ) {
        $data = [
          'ok' => false,
          'code' => $code,
          'message' => $message
        ];

        parent::__construct( $data, 200, $headers );
    }
}
