<?php
/**
 * Template Name: Canvas
 *
 * @package BS5Press_Classic
 */

defined( 'ABSPATH' ) || exit;

get_template_part( 'template-parts/site-header' );

if ( have_posts() ) :
    while ( have_posts() ) :
        the_post();

        /**
         * Hook before canvas content.
         *
         * @since 1.0.0
         */
        do_action( 'bs5pc/before_canvas_content' );

        the_content();

        /**
         * Hook after canvas content.
         *
         * @since 1.0.0
         */
        do_action( 'bs5pc/after_canvas_content' );

    endwhile;
endif;

get_template_part( 'template-parts/site-footer' );
