<?php

defined( 'ABSPATH' ) || exit;

get_template_part( 'template-parts/site-header' );

?>

<header class="bs5pc-site-header">

    <?php
    /**
     * Fires inside the site header.
     *
     * @since 1.0.0
     */
    do_action( 'bs5pc/site_header' );
    ?>

</header>
