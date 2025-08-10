<?php

defined( 'ABSPATH' ) || exit;

/**
 * Adds theme support for menus.
 *
 * @since 1.0.0
 */
add_theme_support( 'menus' );

/**
 * Includes custom Bootstrap-compatible menu walker.
 */
require_once get_template_directory() . '/includes/menu-walker.php';

/**
 * Enqueues theme styles and scripts.
 *
 * @since 1.0.0
 */
add_action( 'wp_enqueue_scripts', 'bs5pc_enqueue_scripts' );

function bs5pc_enqueue_scripts() {
    // Bootstrap CSS
    wp_enqueue_style(
        'bs5pc-bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css',
        [],
        '5.3.7'
    );

    // Main stylesheet (style.css)
    wp_enqueue_style(
        'bs5pc-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get( 'Version' )
    );

    // Bootstrap JS Bundle (includes Popper)
    wp_enqueue_script(
        'bs5pc-bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.7',
        true
    );
}

/**
 * Loads single page template part on custom action 'bs5pc/single'.
 *
 * @since 1.0.0
 */
add_action( 'bs5pc/single', 'bs5pc_add_single' );

function bs5pc_add_single() {
    get_template_part( 'template-parts/page-single' );
}

/**
 * Loads navbar template part in site header.
 *
 * @since 1.0.0
 */
add_action( 'bs5pc/site_header', 'bs5pc_add_navbar' );

function bs5pc_add_navbar() {
    get_template_part( 'template-parts/header-navbar' );
}

/**
 * Displays the primary navigation menu inside the navbar.
 *
 * @since 1.0.0
 */
add_action( 'bs5pc/site_header/navbar/content', 'bs5pc_add_navbar_menu' );

function bs5pc_add_navbar_menu() {
    wp_nav_menu( [
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
        'fallback_cb'    => '__return_false',
        'walker'         => new bs5pc_Menu_Walker(),
    ] );
}

/**
 * Loads footer credits template part.
 *
 * @since 1.0.0
 */
add_action( 'bs5pc/site_footer', 'bs5pc_add_footer' );

function bs5pc_add_footer() {
    get_template_part( 'template-parts/footer-credits' );
}

/**
 * Register theme menu locations.
 *
 * @since 1.0.0
 */
add_action( 'after_setup_theme', 'bs5pc_register_menus' );

function bs5pc_register_menus() {
    register_nav_menus( [
        'primary' => __( 'Primary Menu', 'bs5pc' ),
    ] );
}
