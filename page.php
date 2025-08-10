<?php

defined( 'ABSPATH' ) || exit;

get_header();

?>

<main class="bs5pc-site-main">
    <div class="container my-5">

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class(); ?>>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php esc_html_e( 'Sorry, this page doesn’t exist.', 'bs5pc' ); ?></p>
        <?php endif; ?>

    </div>
</main>

<?php

get_footer();
