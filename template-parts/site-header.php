<?php

defined( 'ABSPATH' ) || exit;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?php
        /*
         * Display the page title dynamically:
         * - Use wp_title() for the current page/post title
         * - Append the site name for branding
         */
        wp_title( '|', true, 'right' );
        echo esc_html( get_bloginfo( 'name' ) );
        ?>
    </title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
