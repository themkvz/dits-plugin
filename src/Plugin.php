<?php

namespace Dits\PluginNamespace;

use Dits\PluginNamespace\Admin\Settings;
use Dits\PluginNamespace\Configuration\ActivatorConfiguration;
use Dits\PluginNamespace\Configuration\AdminPageConfiguration;
use Dits\PluginNamespace\Configuration\AssetsConfiguration;
use Dits\PluginNamespace\Configuration\DeactivatorConfiguration;
use Dits\PluginNamespace\Configuration\I18nConfiguration;
use Dits\PluginNamespace\Configuration\RestApiConfiguration;
use Dits\PluginNamespace\Configuration\SettingsConfiguration;
use Dits\PluginNamespace\Configuration\ViewConfiguration;
use Dits\PluginNamespace\DependencyInjection\Container;
use Dits\PluginNamespace\Utils\HooksInterface;

class Plugin {
    private Container $container;
    private bool $loaded;

    /**
     * Constructor.
     *
     * @param $file
     */
    public function __construct( $file ) {
        $plugin_data = get_plugin_data( $file );

        $this->container = new Container( [
            'plugin_name'     => $plugin_data['Name'],
            'plugin_domain'   => $plugin_data['TextDomain'],
            'plugin_version'  => $plugin_data['Version'],
            'plugin_basename' => plugin_basename( $file ),
            'plugin_path'     => plugin_dir_path( $file ),
            'plugin_dir'      => basename( plugin_dir_path( $file ) ),
            'plugin_url'      => plugin_dir_url( $file )
        ] );

        $this->loaded = false;
    }

    /**
     * Fired when WordPress load plugins
     */
    public function load() {
        if ( $this->loaded ) {
            return;
        }

        // Configure all necessary classes
        $this->container->configure( [
            ActivatorConfiguration::class,
            DeactivatorConfiguration::class,
            AdminPageConfiguration::class,
            SettingsConfiguration::class,
            ViewConfiguration::class,
            AssetsConfiguration::class,
            I18nConfiguration::class,
            RestApiConfiguration::class,
        ] );

        // Invoke all filters and actions
        foreach ( $this->container->get_values() as $key => $value ) {
            if ( $this->container[ $key ] instanceof HooksInterface ) {
                $this->container[ $key ]->hooks();
            }
        }

        $this->loaded = true;
    }

    /**
     * Get plugin setting instance.
     *
     * @return Settings
     */
    public function get_settings(): Settings {
        return $this->container['settings'];
    }

    /**
     * Get plugin view instance.
     *
     * @return View
     */
    public function get_view(): View {
        return $this->container['view'];
    }
}
