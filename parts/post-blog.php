<?php
$title = get_the_title($post->ID);
$content = wp_trim_words(get_the_content($post->ID), 20);
?>

<?php if (is_home() || is_archive() || is_single()) { ?>
    <article id="post-<?php the_ID(); ?>"
             class="col-lg-6 <?php if (is_single()) { ?>col-xl-3 post-single<?php } else { ?>col-xl-4<?php } ?>">
        <div class="card-preview link-cover group-gap standard">
            <?php if (has_post_thumbnail()) { ?>
                <figure class="media landscape card-image">
                    <?php echo get_the_post_thumbnail($post->ID, 'medium', array('loading' => 'lazy')); ?>
                </figure>
            <?php } ?>
            <?php get_template_part('parts/meta', 'news'); ?>
            <?php if ($title) { ?>
                <h2 class="serif bold text-center h3 title">
                    <a class="link-cover-target" href="<?php the_permalink(); ?>"><?php echo $title; ?></a>
                </h2>
            <?php } ?>
            <?php if ($content) { ?>
                <div class="editor">
                    <p><?php echo $content; ?></p>
                </div>
            <?php } ?>
        </div>
    </article>
<?php } else { ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('swiper-slide'); ?>>
        <div class="card-blog link-cover group-gap standard">
            <div class="top flex-grow-1 group-gap standard">
                <?php if (has_post_thumbnail()) { ?>
                    <figure class="media square">
                        <?php echo get_the_post_thumbnail($post->ID, 'medium', array('loading' => 'lazy')); ?>
                    </figure>
                <?php } ?>
                <?php get_template_part('parts/meta', 'news'); ?>
                <?php if ($title) { ?>
                    <h2 class="serif bold text-center h3"><?php echo $title; ?></h2>
                <?php } ?>
                <?php if ($content) { ?>
                    <div class="editor">
                        <p><?php echo $content; ?></p>
                    </div>
                <?php } ?>
            </div>
            <div class="bottom d-flex justify-content-center">
                <div class="elements">
                    <a class="button secondary link-cover-target" href="<?php the_permalink(); ?>">
                        Read article
                    </a>
                </div>
            </div>
        </div>
    </article>
<?php } ?>