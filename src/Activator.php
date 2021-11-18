<?php

namespace Dits\PluginNamespace;

use Dits\PluginNamespace\Utils\HooksInterface;

class Activator implements HooksInterface {
    public string $plugin_name;
    public string $plugin_table;

    const KEY = 'dits-plugin-slug-to-replace';
    const WP_VERSION = '5.0';

    /**
     * Constructor.
     *
     * @param string $plugin_name
     */
    public function __construct( string $plugin_name ) {
        $this->plugin_name  = $plugin_name;
    }

    /**
     * @inheritdoc
     */
    public function hooks() {
        add_action( 'admin_notices', [ $this, 'admin_notices' ] );
        add_action( 'shutdown', [ $this, 'shutdown' ] );
    }

    /**
     * Show admin notices after activate plugin.
     */
    public function admin_notices() {
        if ( ! self::compatible_version() ) {
            ?>
            <div class="notice notice-error is-dismissible">
                <p>
                    <strong><?php echo $this->plugin_name; ?></strong>
                    <?php
                    echo sprintf( __( 'requires WordPress %s or higher!', 'dits' ), self::WP_VERSION )
                    ?>
                </p>
            </div>
            <?php

            if ( isset( $_GET['activate'] ) ) {
                unset( $_GET['activate'] );
            }
        }

        if ( get_transient( self::KEY ) ) {
            ?>
            <div class="updated notice is-dismissible">
                <p><?php echo sprintf( __( 'Thank you for using %s!', 'dits' ), $this->plugin_name ); ?>
                    <strong><?php echo __( 'You are awesome', 'dits' ); ?></strong>.
                </p>
            </div>
            <?php
        }
    }

    /**
     * Check compatible version.
     *
     * @return bool
     */
    public static function compatible_version(): bool {
        if ( version_compare( $GLOBALS['wp_version'], self::WP_VERSION, '<' ) ) {
            return false;
        }

        return true;
    }

    /**
     * Fired during plugin activation.
     *
     * Set temp transient.
     */
    public static function activate() {
        set_transient( self::KEY, true );
    }

    /**
     * Remove temp transient after all necessary actions.
     */
    public function shutdown() {
        delete_transient( self::KEY );
    }
}
