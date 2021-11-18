<?php

namespace Dits\PluginNamespace;

use Dits\PluginNamespace\Utils\HooksInterface;

class Assets implements HooksInterface {
    private string $plugin_version;
    private string $plugin_url;
    private string $plugin_dir;
    private string $min;

    /**
     * Constructor.
     *
     * @param string $plugin_version
     * @param string $plugin_url
     * @param string $plugin_dir
     */
    public function __construct( string $plugin_version, string $plugin_url, string $plugin_dir ) {
        $this->plugin_version = $plugin_version;
        $this->plugin_url     = $plugin_url;
        $this->plugin_dir     = $plugin_dir;

        $this->min = WP_DEBUG ? '' : '.min';
    }

    /**
     * @inheritdoc
     */
    public function hooks() {
        add_action( 'admin_enqueue_scripts', [ $this, 'admin_assets' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'front_assets' ] );
    }

    /**
     * Include back-end assets.
     */
    public function admin_assets() {
        wp_enqueue_style(
            $this->plugin_dir . '-admin',
            $this->plugin_url . 'assets/dist/admin' . $this->min . '.css',
            [],
            $this->plugin_version
        );

        wp_enqueue_style( 'wp-color-picker' );

        wp_enqueue_script(
            $this->plugin_dir . '-admin',
            $this->plugin_url . 'assets/dist/admin' . $this->min . '.js',
            [],
            $this->plugin_version,
            true
        );

        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script( 'jquery' );

        wp_enqueue_media();

        // Js object for WordPress Rest Api
        wp_localize_script( $this->plugin_dir . '-admin', 'ditsPluginApiSettings', [
            'root'      => esc_url_raw( rest_url() ),
            'namespace' => $this->plugin_dir . '/',
            'nonce'     => wp_create_nonce( 'wp_rest' )
        ] );
    }

    /**
     * Include front-end assets.
     */
    public function front_assets() {
        wp_enqueue_style(
            $this->plugin_dir . '-front',
            $this->plugin_url . 'assets/dist/main' . $this->min . '.css',
            [],
            $this->plugin_version
        );

        wp_enqueue_script(
            $this->plugin_dir . '-front',
            $this->plugin_url . 'assets/dist/main' . $this->min . '.js',
            [],
            $this->plugin_version,
            true
        );
    }
}
