<?php

namespace BS5PC;

defined( 'ABSPATH' ) || die();

/**
 * Theme Settings Page Class.
 *
 * @since 1.1.0
 */
final class Theme_Settings {

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
     * @return Theme_Settings
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
        add_action( 'admin_menu', [ $this, 'add_settings_page' ] );
        add_action( 'admin_init', [ $this, 'register_settings' ] );
    }

    /**
     * Adds settings page under Appearance menu.
     *
     * @since 1.1.0
     */
    public function add_settings_page() {
        add_theme_page(
            esc_html__( 'Theme Settings', 'bs5pc' ),
            esc_html__( 'Theme Settings', 'bs5pc' ),
            'manage_options',
            'bs5pc-settings',
            [ $this, 'render_settings_page' ]
        );
    }

    /**
     * Registers settings, sections, and fields.
     *
     * @since 1.1.0
     */
    public function register_settings() {
        register_setting(
            'bs5pc_settings_group',
            'bs5pc_settings',
            [ $this, 'sanitize_settings' ]
        );

        // Assets section.
        add_settings_section(
            'bs5pc_assets_section',
            esc_html__( 'Assets', 'bs5pc' ),
            [ $this, 'assets_section_callback' ],
            'bs5pc-settings'
        );

        // Bootstrap CSS and JavaScript.
        add_settings_field(
            'bs5pc_bootstrap_css_js',
            esc_html__( 'Bootstrap CSS and JavaScript', 'bs5pc' ),
            [ $this, 'bootstrap_css_js_callback' ],
            'bs5pc-settings',
            'bs5pc_assets_section'
        );
    }

    /**
     * Sanitizes settings input.
     *
     * @since 1.1.0
     *
     * @param array $input Raw input values.
     * @return array Sanitized values.
     */
    public function sanitize_settings( $input ) {
        $output = [];

        $output['bootstrap_css_js'] = in_array( $input['bootstrap_css_js'] ?? '', [ 'cdn', 'theme' ], true )
            ? $input['bootstrap_css_js']
            : 'cdn';

        return $output;
    }

    /**
     * Assets section description callback.
     *
     * @since 1.1.0
     */
    public function assets_section_callback() {
        printf( '<span>%s</span>',
            esc_html__( 'Adjust the theme assets settings.', 'bs5pc' ),
        );
    }

    /**
     * Renders the Asset Loading Method radio buttons.
     *
     * @since 1.1.0
     */
    public function bootstrap_css_js_callback() {
        $options = get_option( 'bs5pc_settings' );
        $method  = isset( $options['bootstrap_css_js'] ) ? $options['bootstrap_css_js'] : 'cdn';

        $choices = [
            'cdn'   => esc_html__( 'Load from CDN', 'bs5pc' ),
            'theme' => esc_html__( 'Load from Theme (single bundle)', 'bs5pc' ),
        ];

        foreach ( $choices as $value => $label ) {
            printf(
                '<label><input type="radio" name="bs5pc_settings[bootstrap_css_js]" value="%1$s" %2$s> %3$s</label><br>',
                esc_attr( $value ),
                checked( $method, $value, false ),
                esc_html( $label )
            );
        }
    }

    /**
     * Renders the sample text input field.
     *
     * @since 1.1.0
     */
    public function sample_text_callback() {
        $settings    = get_option( 'bs5pc_settings' );
        $sample_text = isset( $settings['sample_text'] ) ? esc_attr( $settings['sample_text'] ) : '';

        echo '<input type="text" name="bs5pc_settings[sample_text]" value="' . $sample_text . '" class="regular-text" />';
    }

    /**
     * Outputs the settings page HTML.
     *
     * @since 1.1.0
     */
    public function render_settings_page() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e( 'Theme Settings', 'bs5pc' ); ?></h1>
            <form method="post" action="options.php">
                <?php
                    settings_fields( 'bs5pc_settings_group' );
                    do_settings_sections( 'bs5pc-settings' );
                    submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}

/**
 * Initializes the Theme_Settings class.
 *
 * @since 1.1.0
 */
Theme_Settings::get_instance();
