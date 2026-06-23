<header aria-labelledby="post-title">
    <h1 id="post-title"><?php the_title(); ?></h1>
    <?php
    $excerpt = get_the_excerpt($post->ID);

    if (!empty(trim($excerpt))) :
        ?>
        <p><?php echo esc_html($excerpt); ?></p>
    <?php endif; ?>
    <?php if (has_post_thumbnail()) { ?>
        <?php echo get_the_post_thumbnail($post->ID, 'huge', array('loading' => 'eager')); ?>
    <?php } ?>
</header>