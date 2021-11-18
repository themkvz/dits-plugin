<?php

namespace Dits\PluginNamespace;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class View {
    private Environment $twig;

    /**
     * Constructor.
     *
     * @param $plugin_path
     */
    public function __construct( $plugin_path ) {
        $loader     = new FilesystemLoader( $plugin_path . '/templates' );
        $this->twig = new Environment( $loader, [
            'cache'       => $plugin_path . '/cache',
            'auto_reload' => true,
            'debug'       => WP_DEBUG,
        ] );

        if ( WP_DEBUG ) {
            $this->twig->addExtension( new DebugExtension() );
        }
    }

    /**
     * Return Twig template.
     *
     * @param string $template
     * @param array  $args
     *
     * @return string
     */
    public function get( string $template, array $args = [] ): string {
        try {
            return $this->twig->render( $template, $args );
        } catch ( LoaderError | RuntimeError | SyntaxError $e ) {
            return $e;
        }
    }

    /**
     * Display Twig template.
     *
     * @param string $template
     * @param array  $args
     */
    public function render( string $template, array $args = [] ) {
        echo $this->get( $template, $args );
    }
}
