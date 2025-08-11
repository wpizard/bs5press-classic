<?php

namespace BS5PC;

defined( 'ABSPATH' ) || die();

/**
 * Assets Management Class.
 *
 * @since 1.1.0
 */
final class Assets {

    /**
     * The instance.
     *
     * @since 1.1.0
     */
    private static $instance;

    /**
     * Returns the instance.
     *
     * @since 1.1.0
     *
     * @return Assets
     */
    public static function get_instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Constructor.
     *
     * @since 1.1.0
     */
    private function __construct() {
        $this->add_hooks();
    }

    /**
     * Adds hooks.
     *
     * @since 1.1.0
     */
    protected function add_hooks() {
        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
    }

    /**
     * Registers scripts and styles.
     *
     * @since 1.1.0
     */
    public function register_assets() {
        wp_register_style(
            'bs5pc-bootstrap',
            BS5PC_ASSETS_URI . '/bootstrap/bootstrap.min.css',
            [],
            BS5PC_BOOTSTRAP_VERSION
        );

        wp_register_script(
            'bs5pc-bootstrap',
            BS5PC_ASSETS_URI . '/bootstrap/bootstrap.bundle.min.js',
            [],
            BS5PC_BOOTSTRAP_VERSION,
            true
        );

         // Bootstrap CSS from CDN
        wp_register_style(
            'bs5pc-bootstrap-cdn',
            'https://cdn.jsdelivr.net/npm/bootstrap@' . BS5PC_BOOTSTRAP_VERSION . '/dist/css/bootstrap.min.css',
            [],
            BS5PC_BOOTSTRAP_VERSION
        );

        // Bootstrap JS bundle from CDN (includes Popper)
        wp_register_script(
            'bs5pc-bootstrap-cdn',
            'https://cdn.jsdelivr.net/npm/bootstrap@' . BS5PC_BOOTSTRAP_VERSION . '/dist/js/bootstrap.bundle.min.js',
            [],
            BS5PC_BOOTSTRAP_VERSION,
            true
        );
    }

    /**
     * Enqueues scripts and styles based on settings.
     *
     * @since 1.1.0
     */
    public function enqueue_assets() {
        $options = get_option( 'bs5pc_settings', [] );
        $method  = $options['bootstrap_css_js'] ?? 'cdn';

         // Theme main stylesheet
        wp_enqueue_style(
            'bs5pc-style',
            get_stylesheet_uri(),
            [],
            BS5PC_VERSION
        );

        if ( $method === 'cdn' ) {
            wp_enqueue_style( 'bs5pc-bootstrap-cdn' );
            wp_enqueue_script( 'bs5pc-bootstrap-cdn' );
        } elseif ( $method === 'theme' ) {
            wp_enqueue_style( 'bs5pc-bootstrap' );
            wp_enqueue_script( 'bs5pc-bootstrap' );
        }
    }
}

/**
 * Initializes the Assets class.
 *
 * @since 1.1.0
 */
Assets::get_instance();
