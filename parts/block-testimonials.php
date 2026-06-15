<?php

$id = 'testimonials-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$background_colour = get_field('background_colour');
$items = get_field('items');
?>

<section id="<?php echo esc_attr($id); ?>"
         class="block-padding <?php if ($background_colour) { ?>bg <?php echo $background_colour; ?><?php } ?>">
    <div class="container elements group-gap large">
        <?php get_template_part('parts/global', 'block-intro'); ?>
        <?php
        $featured_posts = get_field('picker');
        if ($featured_posts):
            global $post;
            ?>
            <div class="swiper" data-items="<?php if ($items) { ?><?php echo $items; ?><?php } else { ?>3<?php } ?>">
                <div class="swiper-wrapper">
                    <?php foreach ($featured_posts as $post):
                        setup_postdata($post);
                        ?>
                        <?php get_template_part('parts/post', 'testimonials'); ?>
                    <?php endforeach; ?>
                </div>
                <?php get_template_part('parts/global', 'carousel-controls'); ?>
            </div>
            <?php
            wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>