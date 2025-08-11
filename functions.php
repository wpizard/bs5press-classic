<?php

defined( 'ABSPATH' ) || exit;

/**
 * Defines theme constants.
 *
 * @since 1.1.0
 */
define( 'BS5PC_VERSION', '1.1.0' );
define( 'BS5PC_SLUG', 'bs5pc' );
define( 'BS5PC_DIR_PATH', get_template_directory() );
define( 'BS5PC_INCLUDES_PATH', BS5PC_DIR_PATH . '/includes' );
define( 'BS5PC_DIR_URI', get_template_directory_uri() );
define( 'BS5PC_ASSETS_URI', BS5PC_DIR_URI . '/assets' );
define( 'BS5PC_BOOTSTRAP_VERSION', '5.3.7' );

/**
 * Adds theme support for menus.
 *
 * @since 1.0.0
 */
add_theme_support( 'menus' );

/**
 * Includes dependency files.
 *
 * @since 1.0.0
 * @since 1.1.0 Added inclusion of assets.php and theme-settings.php file and used constant.
 */
require_once BS5PC_INCLUDES_PATH . '/assets.php';
require_once BS5PC_INCLUDES_PATH . '/menu-walker.php';
require_once BS5PC_INCLUDES_PATH . '/theme-settings.php';

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
