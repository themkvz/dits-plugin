<?php

namespace Dits\PluginNamespace\Admin;

use Dits\PluginNamespace\View;

class Settings {
    public array $settings_sections = [];
    public array $settings_fields = [];
    public View $view;
    public string $prefix;

    /**
     * Constructor.
     *
     * @param View   $view
     * @param string $plugin_dir
     */
    public function __construct( View $view, string $plugin_dir = '' ) {
        $this->view   = $view;
        $this->prefix = "{$plugin_dir}_";
    }

    /**
     * Set settings sections
     *
     * @param array $sections setting sections array
     */
    public function set_sections( array $sections ): Settings {
        foreach ( $sections as $section ) {
            $this->add_section( $section );
        }

        return $this;
    }

    /**
     * Add a single section
     *
     * @param array $section
     *
     * @return Settings
     */
    public function add_section( array $section ): Settings {
        $section['id'] = isset( $section['id'] )
            ? $this->prefix . $section['id']
            : $this->prefix . count( $this->settings_sections );

        $this->settings_sections[] = $section;

        return $this;
    }

    /**
     * Set settings fields
     *
     * @param array $fields settings fields array
     */
    public function set_fields( array $fields ): Settings {
        foreach ( $fields as $section_id => $value ) {
            foreach ( $value as $field ) {
                $this->add_field( $section_id, $field );
            }
        }

        return $this;
    }

    public function add_field( string $section, array $field ): Settings {
        $type     = $field['type'] ?? 'text';
        $std      = $field['default'] ?? false;
        $value    = $this->get( $field['id'], $section, $std );
        $name     = sprintf( '%s[%s]', $this->prefix . $section, $field['id'] );
        $callback = $field['callback']
                    ?? method_exists( $this, 'callback_' . $type )
                        ? [ $this, 'callback_' . $type ]
                        : [ $this, 'callback_text' ];

        $args = [
            'id'                => $field['id'],
            'label'             => $field['label'] ?? $field['id'],
            'class'             => $field['class'] ?? $field['id'],
            'desc'              => $field['desc'] ?? '',
            'size'              => $field['size'] ?? 'regular',
            'options'           => $field['options'] ?? [],
            'sanitize_callback' => $field['sanitize_callback'] ?? '',
            'placeholder'       => $field['placeholder'] ?? '',
            'min'               => $field['min'] ?? '',
            'max'               => $field['max'] ?? '',
            'step'              => $field['step'] ?? '',
            'button'            => $field['button'] ?? __( 'Choose File', 'dits' ),
            'name'              => $name,
            'label_for'         => $name,
            'std'               => $std,
            'type'              => $type,
            'section'           => $section,
            'callback'          => $callback,
            'value'             => $value
        ];

        $this->settings_fields[ $this->prefix . $section ][] = $args;

        return $this;
    }

    /**
     * Initialize and registers the settings sections and fields to WordPress
     *
     * Usually this should be called at `admin_init` hook.
     *
     * This function gets the initiated settings sections and fields. Then
     * registers them to WordPress and ready for use.
     */
    function admin_init() {
        //register settings sections
        // FIXME
        foreach ( $this->settings_sections as $section ) {
            if ( false == get_option( $section['id'] ) ) {
                add_option( $section['id'] );
            }

            if ( isset( $section['desc'] ) && ! empty( $section['desc'] ) ) {
                $section['desc'] = '<div class="inside">' . $section['desc'] . '</div>';
                $callback        = function () use ( $section ) {
                    echo str_replace( '"', '\"', $section['desc'] );
                };
            } else {
                $callback = $section['callback'] ?? null;
            }

            add_settings_section( $section['id'], $section['title'], $callback, $section['id'] );
        }

        //register settings fields
        foreach ( $this->settings_fields as $section => $field ) {

            foreach ( $field as $option ) {
                add_settings_field( $option['id'], $option['label'], $option['callback'], $section, $section, $option );
            }

        }

        // creates our settings in the options table
        foreach ( $this->settings_sections as $section ) {
            register_setting( $section['id'], $section['id'], [ $this, 'sanitize_options' ] );
        }
    }

    /**
     * Displays a text field for a settings field
     *
     * @param array $args settings field args
     */
    public function callback_text( array $args ) {
        $this->view->render( 'fields/text.twig', $args );
    }

    /**
     * Displays an url field for a settings field
     *
     * @param array $args settings field args
     */
    public function callback_url( array $args ) {
        $this->callback_text( $args );
    }

    /**
     * Displays a number field for a settings field
     *
     * @param array $args settings field args
     */
    public function callback_number( array $args ) {
        $this->view->render( 'fields/number.twig', $args );
    }

    /**
     * Displays a checkbox for a settings field
     *
     * @param array $args settings field args
     */
    public function callback_checkbox( array $args ) {
        $args['checked'] = checked( $args['value'], 'on', false );

        $this->view->render( 'fields/checkbox.twig', $args );
    }

    /**
     * Displays a multicheckbox for a settings field
     *
     * @param array $args settings field args
     */
    public function callback_multicheck( array $args ) {
        foreach ( $args['options'] as $key => $option ) {
            $checked = $args['value'][ $key ] ?? null;

            $args['options'][ $key ] = [
                'label'   => $option,
                'name'    => sprintf( '%s[%s]', $args['name'], $key ),
                'checked' => checked( $checked, $key, false )
            ];
        }

        $this->view->render( 'fields/multicheck.twig', $args );
    }

    /**
     * Displays a radio button for a settings field
     *
     * @param array $args settings field args
     */
    public function callback_radio( array $args ) {
        foreach ( $args['options'] as $key => $option ) {
            $args['options'][ $key ] = [
                'label'   => $option,
                'name'    => sprintf( '%s[%s]', $args['name'], $key ),
                'checked' => checked( $args['value'], $key, false )
            ];
        }

        $this->view->render( 'fields/radio.twig', $args );
    }

    /**
     * Displays a selectbox for a settings field
     *
     * @param array $args settings field args
     */
    public function callback_select( array $args ) {
        foreach ( $args['options'] as $key => $option ) {
            $args['options'][ $key ] = [
                'label'    => $option,
                'selected' => selected( $args['value'], $key, false )
            ];
        }

        $this->view->render( 'fields/select.twig', $args );
    }

    /**
     * Displays a textarea for a settings field
     *
     * @param array $args settings field args
     */
    public function callback_textarea( array $args ) {
        $this->view->render( 'fields/textarea.twig', $args );
    }

    /**
     * Displays a rich text textarea for a settings field
     *
     * @param array $args settings field args
     */
    public function callback_wysiwyg( array $args ) {
        $editor_settings = array(
            'teeny'         => true,
            'textarea_name' => $args['name'],
            'textarea_rows' => 10
        );

        if ( isset( $args['options'] ) && is_array( $args['options'] ) ) {
            $editor_settings = array_merge( $editor_settings, $args['options'] );
        }

        ob_start();
        wp_editor( $args['value'], $args['section'] . '-' . $args['id'], $editor_settings );

        $args['editor'] = ob_get_clean();

        $this->view->render( 'fields/wysiwyg.twig', $args );
    }

    /**
     * Displays a file upload field for a settings field
     *
     * @param array $args settings field args
     */
    public function callback_file( array $args ) {
        $this->view->render( 'fields/file.twig', $args );
    }

    /**
     * Displays a password field for a settings field
     *
     * @param array $args settings field args
     */
    public function callback_password( array $args ) {
        $args['value'] = str_repeat( '*', strlen( $args['value'] ) );

        $this->view->render( 'fields/text.twig', $args );
    }

    /**
     * Displays a color picker field for a settings field
     *
     * @param array $args settings field args
     */
    public function callback_color( array $args ) {
        $this->view->render( 'fields/color.twig', $args );
    }

    /**
     * Displays an image field for a settings field
     *
     * @param array $args settings field args
     */
    public function callback_image( array $args ) {
        $args['src']  = wp_get_attachment_image_url( $args['value'] );
        $args['text'] = [
            'select'          => __( 'Select image', 'dits' ),
            'uploader_title'  => __( 'Select the image', 'dits' ),
            'uploader_button' => __( 'Use image', 'dits' ),
            'clear'           => __( 'Clear', 'dits' )
        ];

        $this->view->render( 'fields/image.twig', $args );
    }

    /**
     * Sanitize callback for Settings API
     *
     * @return mixed
     */
    public function sanitize_options( $options ) {

        if ( ! $options ) {
            return null;
        }

        foreach ( $options as $option_slug => $option_value ) {
            $sanitize_callback = $this->get_sanitize_callback( $option_slug );

            // If callback is set, call it
            if ( $sanitize_callback ) {
                $options[ $option_slug ] = call_user_func( $sanitize_callback, $option_value );
                continue;
            }
        }

        return $options;
    }

    /**
     * Get sanitization callback for given option slug
     *
     * @param string $slug option slug
     *
     * @return callable|false string or bool false
     */
    public function get_sanitize_callback( string $slug = '' ) {
        if ( empty( $slug ) ) {
            return false;
        }

        // Iterate over registered fields and see if we can find proper callback
        foreach ( $this->settings_fields as $section => $options ) {
            foreach ( $options as $option ) {
                if ( isset( $option['name'] ) && $option['name'] !== $slug ) {
                    continue;
                }

                // Return the callback name
                return isset( $option['sanitize_callback'] ) && is_callable( $option['sanitize_callback'] ) ? $option['sanitize_callback'] : false;
            }
        }

        return false;
    }

    /**
     * Get the value of a settings field
     *
     * @param string      $option
     * @param string      $section
     * @param bool|string $default
     *
     * @return false|mixed
     */
    public function get( string $option, string $section, $default = false ) {
        if ( strpos( $section, $this->prefix ) === false ) {
            $section = $this->prefix . $section;
        }

        $options = get_option( $section );

        if ( isset( $options[ $option ] ) ) {
            return $options[ $option ];
        }

        return $default;
    }

    /**
     * Show navigations as tab
     *
     * Shows all the settings section labels as tab
     */
    public function get_navigation(): string {
        $count = count( $this->settings_sections );

        // don't show the navigation if only one section exists
        if ( $count === 1 ) {
            return '';
        }

        $args = [
            'sections' => $this->settings_sections
        ];

        return $this->view->get( 'admin/navigation.twig', $args );
    }

    /**
     * Show the section settings forms
     *
     * This function displays every section in a different form
     */
    public function get_forms(): string {
        $args = [
            'sections' => array_map( function ( $section ) {
                ob_start();
                settings_fields( $section['id'] );
                $section['settings_fields'] = ob_get_clean();

                ob_start();
                do_settings_sections( $section['id'] );
                $section['do_settings_sections'] = ob_get_clean();

                $section['submit'] = get_submit_button();

                return $section;
            }, $this->settings_sections )
        ];

        return $this->view->get( 'admin/forms.twig', $args );
    }
}
