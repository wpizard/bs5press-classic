<?php

defined( 'ABSPATH' ) || exit;

get_header();

?>

<main class="bs5pc-site-main">

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();

            /**
             * Hook before full width content.
             *
             * @since 1.0.0
             */
            do_action( 'bs5pc/before_full_width_content' );

            the_content();

            /**
             * Hook after full width content.
             *
             * @since 1.0.0
             */
            do_action( 'bs5pc/after_full_width_content' );

        endwhile;
    endif;
    ?>

</main>

<?php

get_footer();
