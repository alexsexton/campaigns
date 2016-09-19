<div class="comment-author vcard author">
    <?php echo ( $args['avatar_size'] != 0 ? get_avatar( $comment, $args['avatar_size'] ) :'' ); ?>
    <cite class="fn n author-name"><?php echo get_comment_author_link(); ?></cite>
</div>
<?php if( !$comment->comment_approved ) : ?>
    <em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em>

<?php else: comment_text(); ?>
<?php endif; ?>

<div class="comment-meta comment-meta-data">
    <a href="<?php echo esc_attr( get_comment_link( get_comment_ID() ) ) ?>"><?php comment_date(); ?> at <?php comment_time(); ?></a> <?php edit_comment_link( '(Edit)' ); ?>
</div>

<div class="reply">
    <?php $reply_args = array(
        'add_below' => $add_below,
        'depth' => $depth,
        'max_depth' => $args['max_depth'] );

    comment_reply_link( array_merge( $args, $reply_args ) );  ?>
</div>
