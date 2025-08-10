<?php

defined( 'ABSPATH' ) || exit;

?>

<div class="container py-5">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <article <?php post_class(); ?>>

                <h1><?php the_title(); ?></h1>

                <p class="text-muted">
                    <?php
                    /* translators: %1$s: post date, %2$s: post author */
                    printf(
                        esc_html__( 'Published on %1$s by %2$s', 'bs5pc' ),
                        esc_html( get_the_date( 'F j, Y' ) ),
                        esc_html( get_the_author() )
                    );
                    ?>
                </p>

                <div class="post-thumbnail mb-3">
                    <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'large' );
                    }
                    ?>
                </div>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>

                <div class="post-categories">
                    <strong><?php esc_html_e( 'Categories:', 'bs5pc' ); ?></strong>
                    <?php the_category( ', ' ); ?>
                </div>

                <div class="post-tags">
                    <strong><?php esc_html_e( 'Tags:', 'bs5pc' ); ?></strong>
                    <?php the_tags( '', ', ' ); ?>
                </div>

            </article>

            <hr>

            <div class="comments-section">
                <?php comments_template(); ?>
            </div>

        <?php endwhile; ?>
    <?php else : ?>
        <p><?php esc_html_e( 'Sorry, no post found.', 'bs5pc' ); ?></p>
    <?php endif; ?>
</div>
