<?php
$title = get_the_title($post->ID);
$content = wp_trim_words(get_the_content($post->ID), 50);

$person = get_field('person', $post->ID);
$date = get_field('date', $post->ID);
$rating = get_field('rating', $post->ID);
$link = get_field('link', $post->ID);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('swiper-slide'); ?>>
    <div class="card-plain">
        <div class="card-plain-top">
            <div class="card-header text-center">
                <?php if (has_post_thumbnail()) { ?>
                    <figure class="media square profile spacing">
                        <?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array('loading' => 'lazy')); ?>
                    </figure>
                <?php } ?>
                <div class="group-gap tiny">
                    <?php if ($person) { ?>
                        <p class="serif bold font-medium"><?php echo $person; ?></p>
                    <?php } ?>
                    <?php if ($date) { ?>
                        <p class="serif font-small date-text"><?php echo $date; ?></p>
                    <?php } ?>
                    <?php if ($rating) { ?>
                        <div class="rating" style="--rating: <?php echo $rating; ?>;">
                            <span class="visually-hidden">Rating is <?php echo $rating; ?> out of 5</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php if ($title) { ?>
                <blockquote class="text-center spacing">
                    &ldquo;<?php echo $title; ?>&rdquo;
                </blockquote>
            <?php } ?>
            <?php if ($content) { ?>
                <div class="editor font-medium">
                    <p><?php echo $content; ?></p>
                </div>
            <?php } ?>
        </div>
        <?php if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="card-plain-bottom d-flex justify-content-center">
                <div class="spacing-top">
                    <a class="button secondary" href="<?php echo esc_url($link_url); ?>"
                       target="<?php echo esc_attr($link_target); ?>">
                        <span><?php echo esc_html($link_title); ?></span>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</article>