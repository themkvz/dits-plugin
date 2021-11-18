<?php

namespace Dits\PluginNamespace\Admin;

use Dits\PluginNamespace\Utils\HooksInterface;
use Dits\PluginNamespace\View;

class AdminPage implements HooksInterface {
    public Settings $settings;
    public View $view;
    public string $plugin_basename;

    /**
     * Constructor.
     *
     * @param Settings $settings
     * @param View     $view
     * @param          $plugin_basename
     */
    public function __construct( Settings $settings, View $view, $plugin_basename ) {
        $this->settings        = $settings;
        $this->view            = $view;
        $this->plugin_basename = $plugin_basename;
    }

    /**
     * Plugin menu title.
     *
     * @return string
     */
    public function get_menu_title(): string {
        return __( 'Dits_Plugin_Name', 'dits' );
    }

    /**
     * Plugin page title.
     *
     * @return string
     */
    public function get_page_title(): string {
        return __( 'Dits_Plugin_Name', 'dits' );
    }

    /**
     * Plugins screen setting link.
     *
     * @return string
     */
    public function get_plugins_page_title(): string {
        return __( 'Settings', 'dits' );
    }

    /**
     * Plugin setting page slug.
     *
     * @return string
     */
    public function get_slug(): string {
        return 'dits-plugin-slug-to-replace';
    }

    /**
     * Get capability for plugin admin page.
     *
     * @return string
     */
    public function get_capability(): string {
        return 'install_plugins';
    }

    /**
     * Get parent slug.
     *
     * @return string
     */
    public function get_parent_slug(): string {
        return '';
    }

    /**
     * Get page url.
     *
     * @return string
     */
    public function get_page_url(): string {
        return admin_url( $this->get_parent_slug() ) . '?page=' . $this->get_slug();
    }

    /**
     * Render admin page.
     */
    public function admin_page() {
        $args = [
            'title'      => $this->get_page_title(),
            'navigation' => $this->settings->get_navigation(),
            'forms'      => $this->settings->get_forms()
        ];

        $this->view->render( 'admin/page.twig', $args );
    }

    /**
     * Register settings sections and fields.
     */
    public function admin_init() {
        $this->settings->set_sections( [
            [
                'title'    => __( 'Dits_Plugin_Name', 'dits' ),
                'callback' => [ $this, 'example_section_callback' ]
            ],
            [
                'id'    => 'general',
                'title' => __( 'General', 'dits' ),
            ]
        ] );

        $this->settings->set_fields( [
            'general' => [
                [
                    'id'          => 'Text',
                    'type'        => 'Text',
                    'label'       => 'Text label',
                    'desc'        => 'Text description',
                    'default'     => 'Text default',
                    'placeholder' => 'Text placeholder'
                ],
                [
                    'id'          => 'Url',
                    'type'        => 'Url',
                    'label'       => 'Url label',
                    'desc'        => 'Url description',
                    'default'     => 'Url default value',
                    'placeholder' => 'Url placeholder'
                ],
                [
                    'id'          => 'Number',
                    'type'        => 'Number',
                    'label'       => 'Number label',
                    'desc'        => 'Number description',
                    'default'     => '42',
                    'placeholder' => 'Number placeholder'
                ],
                [
                    'id'          => 'Checkbox',
                    'type'        => 'Checkbox',
                    'label'       => 'Checkbox label',
                    'desc'        => 'Checkbox description',
                    'default'     => 'on',
                    'placeholder' => 'Checkbox placeholder'
                ],
                [
                    'id'          => 'multicheck',
                    'type'        => 'Multicheck',
                    'label'       => 'Multicheck label',
                    'desc'        => 'Multicheck description',
                    'default'     => [ 'two' => 'two' ],
                    'placeholder' => 'Multicheck placeholder',
                    'options'     => [
                        'one' => 'One',
                        'two' => 'Two'
                    ]
                ],
                [
                    'id'          => 'Radio',
                    'type'        => 'Radio',
                    'label'       => 'Radio label',
                    'desc'        => 'Radio description',
                    'default'     => 'four',
                    'placeholder' => 'Radio placeholder',
                    'options'     => [
                        'three' => 'Three',
                        'four'  => 'Four'
                    ]
                ],
                [
                    'id'          => 'Select',
                    'type'        => 'Select',
                    'label'       => 'Select label',
                    'desc'        => 'Select description',
                    'default'     => '2',
                    'placeholder' => 'Select placeholder',
                    'options'     => [
                        '1' => 'Select 1',
                        '2' => 'Select 2'
                    ]
                ],
                [
                    'id'          => 'Textarea',
                    'type'        => 'Textarea',
                    'label'       => 'Textarea label',
                    'desc'        => 'Textarea description',
                    'default'     => 'Textarea default value',
                    'placeholder' => 'Textarea placeholder'
                ],
                [
                    'id'          => 'Wysiwyg',
                    'type'        => 'Wysiwyg',
                    'label'       => 'Wysiwyg label',
                    'desc'        => 'Wysiwyg description',
                    'default'     => 'Wysiwyg default value',
                    'placeholder' => 'Wysiwyg placeholder'
                ],
                [
                    'id'          => 'File',
                    'type'        => 'File',
                    'label'       => 'File label',
                    'desc'        => 'File description',
                    'placeholder' => 'File placeholder'
                ],
                [
                    'id'          => 'Password',
                    'type'        => 'Password',
                    'label'       => 'Password label',
                    'desc'        => 'Password description',
                    'default'     => 'Password default value',
                    'placeholder' => 'Password placeholder'
                ],
                [
                    'id'          => 'Color',
                    'type'        => 'Color',
                    'label'       => 'Color label',
                    'desc'        => 'Color description',
                    'default'     => '#f1f2f3',
                    'placeholder' => 'Color placeholder'
                ],
                [
                    'id'          => 'Image',
                    'type'        => 'Image',
                    'label'       => 'Image label',
                    'desc'        => 'Image description'
                ]
            ]
        ] );

        $this->settings->admin_init();
    }

    /**
     * Adds the plugin's admin page to the menu.
     */
    public function admin_menu() {
        if ( $this->get_parent_slug() ) {
            add_submenu_page(
                $this->get_parent_slug(),
                $this->get_page_title(),
                $this->get_menu_title(),
                $this->get_capability(),
                $this->get_slug(),
                [ $this, 'admin_page' ] );
        } else {
            add_menu_page(
                $this->get_page_title(),
                $this->get_menu_title(),
                $this->get_capability(),
                $this->get_slug(),
                [ $this, 'admin_page' ]
            );
        }
    }

    /**
     * Adds link from plugins page to admin page.
     *
     * @param array $actions
     *
     * @return array
     */
    public function add_plugin_page_link( array $actions ): array {
        array_unshift( $actions, "<a href=\"{$this->get_page_url()}\">{$this->get_plugins_page_title()}</a>" );

        return $actions;
    }

    /**
     * @inheritdoc
     */
    public function hooks() {
        add_action( 'admin_init', [ $this, 'admin_init' ] );
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
        add_filter( 'plugin_action_links_' . $this->plugin_basename, [ $this, 'add_plugin_page_link' ] );
        add_action( 'add_option', [ $this, 'save_options' ] );
        add_action( 'update_option', [ $this, 'save_options' ] );
    }

    /**
     * Flush rewrite after save settings.
     *
     * @param $option
     */
    public function save_options( $option ) {
        if ( strpos( $option, $this->get_slug() ) !== false ) {
            \flush_rewrite_rules();
        }
    }

    /**
     * Example callback.
     */
    public function example_section_callback() {
        echo '<h2>Example section callback</h2>';
    }
}
