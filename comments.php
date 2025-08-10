<?php

defined( 'ABSPATH' ) || exit;

if ( post_password_required() ) {
    return;
}

?>

<div id="comments" class="mt-5">

    <?php if ( have_comments() ) : ?>
        <h3 class="mb-4"><?php comments_number(); ?></h3>

        <ul class="list-unstyled">
            <?php
            wp_list_comments( [
                'style'       => 'ul',
                'short_ping'  => true,
                'avatar_size' => 48,
                // 'callback' => 'bs5pc_bootstrap_comments', // Uncomment if using custom comment markup.
            ] );
            ?>
        </ul>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav class="comment-navigation my-4" aria-label="<?php esc_attr_e( 'Comment Navigation', 'bs5pc' ); ?>">
                <div class="nav-links d-flex justify-content-between">
                    <div class="nav-previous"><?php previous_comments_link( esc_html__( '← Older Comments', 'bs5pc' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments →', 'bs5pc' ) ); ?></div>
                </div>
            </nav>
        <?php endif; ?>

    <?php else : ?>
        <p class="text-muted"><?php esc_html_e( 'No comments yet. Be the first!', 'bs5pc' ); ?></p>
    <?php endif; ?>

    <?php
    comment_form( [
        'class_form'        => 'comment-form mt-4',
        'class_submit'      => 'btn btn-primary',
        'title_reply_before'=> '<h4>',
        'title_reply_after' => '</h4>',
        'comment_field'     => '
            <div class="form-group mb-3">
                <label for="comment">' . esc_html__( 'Comment', 'bs5pc' ) . '</label>
                <textarea id="comment" name="comment" class="form-control" rows="4" required></textarea>
            </div>',
        'fields'            => [
            'author' => '
                <div class="form-group mb-3">
                    <label for="author">' . esc_html__( 'Name', 'bs5pc' ) . '</label>
                    <input id="author" name="author" type="text" class="form-control" required>
                </div>',
            'email'  => '
                <div class="form-group mb-3">
                    <label for="email">' . esc_html__( 'Email', 'bs5pc' ) . '</label>
                    <input id="email" name="email" type="email" class="form-control" required>
                </div>',
            'url'    => '
                <div class="form-group mb-3">
                    <label for="url">' . esc_html__( 'Website', 'bs5pc' ) . '</label>
                    <input id="url" name="url" type="url" class="form-control">
                </div>',
        ],
    ] );
    ?>

</div>
