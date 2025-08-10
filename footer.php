<?php

defined( 'ABSPATH' ) || exit;

?>

<footer class="bs5pc-site-footer">
    <?php
    /**
     * Fires inside the site footer.
     *
     * @since 1.0.0
     */
    do_action( 'bs5pc/site_footer' );
    ?>
</footer>

<?php
get_template_part( 'template-parts/site-footer' );
