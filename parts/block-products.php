<?php
$id = 'products-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$background_colour = get_field('background_colour');
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
            <div class="swiper" data-items="3">
                <div class="swiper-wrapper">
                    <?php foreach ($featured_posts as $post):
                        setup_postdata($post);
                        ?>
                        <?php get_template_part('parts/post', 'products'); ?>
                    <?php endforeach; ?>
                </div>
                <?php get_template_part('parts/global', 'carousel-controls'); ?>
            </div>
            <?php
            wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>