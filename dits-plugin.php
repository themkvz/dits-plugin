<?php
/**
 * Plugin Name:       Dits_Plugin_Name
 * Description:       Dits Plugin description
 * Version:           0.0.1
 * Plugin URI:        https://github.com/themkvz/dits-plugin
 * Author:            TheMkvz, Dits.md
 * Author URI:        https://github.com/themkvz
 * Contributors:
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       dits
 * Domain Path:       /languages
 */

use Dits\PluginNamespace\Activator;
use Dits\PluginNamespace\Deactivator;

require __DIR__ . '/vendor/autoload.php';

global $dits_plugin;

$dits_plugin = new Dits\PluginNamespace\Plugin( __FILE__ );
add_action( 'plugins_loaded', [ $dits_plugin, 'load' ] );

register_activation_hook( __FILE__, [ Activator::class, 'activate' ] );
register_deactivation_hook( __FILE__, [ Deactivator::class, 'deactivate' ] );

