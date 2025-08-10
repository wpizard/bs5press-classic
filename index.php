<?php

defined( 'ABSPATH' ) || exit;

get_header();

?>

<main class="bs5pc-site-main">
    <div class="container py-5">

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php
                /**
                 * Hook before post item in archive.
                 *
                 * @since 1.0.0
                 */
                do_action( 'bs5pc/before_archive_post' );
                ?>

                <article <?php post_class( 'post border rounded mb-4 py-3 px-4' ); ?>>
                    <h2 class="h3">
                        <a class="link-dark" href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <div><?php the_excerpt(); ?></div>
                </article>

                <?php
                /**
                 * Hook after post item in archive.
                 *
                 * @since 1.0.0
                 */
                do_action( 'bs5pc/after_archive_post' );
                ?>

            <?php endwhile; ?>
        <?php else : ?>
            <p><?php esc_html_e( 'No posts found.', 'bs5pc' ); ?></p>
        <?php endif; ?>

    </div>
</main>

<?php

get_footer();
