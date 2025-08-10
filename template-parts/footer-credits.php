<?php

defined( 'ABSPATH' ) || exit;
?>

<div class="bg-dark text-center text-light py-3">
    <div class="container">
        <p class="mb-0">
            &copy; <?php echo esc_html( date( 'Y' ) ); ?>
            <?php echo esc_html( get_bloginfo( 'name' ) ); ?>.
            <?php esc_html_e( 'All rights reserved.', 'bs5pc' ); ?>
        </p>
    </div>
</div>
