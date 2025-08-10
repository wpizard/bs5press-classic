<?php

defined( 'ABSPATH' ) || exit;

?>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand me-0" href="<?php echo esc_url( home_url() ); ?>">
            <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#bs5pcHeaderNavbar"
            aria-controls="bs5pcHeaderNavbar"
            aria-expanded="false"
            aria-label="<?php esc_attr_e( 'Toggle navigation', 'bs5pc' ); ?>"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="bs5pcHeaderNavbar">
            <?php
            /**
             * Fires inside the navbar collapse container.
             *
             * @since 1.0.0
             */
            do_action( 'bs5pc/site_header/navbar/content' );
            ?>
        </div>
    </div>
</nav>
