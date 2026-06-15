<?php
$id = 'extras-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$background_colour = get_field('background_colour');
$link = get_field('link');
$link_image = get_field('link_image');
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
            <div class="swiper cards"
                 data-items="<?php if ($items) { ?><?php echo $items; ?><?php } else { ?>3<?php } ?>">
                <div class="swiper-wrapper">
                    <?php foreach ($featured_posts as $post):
                        setup_postdata($post);
                        ?>
                        <?php get_template_part('parts/post', 'extras'); ?>
                    <?php endforeach; ?>
                </div>
                <?php get_template_part('parts/global', 'carousel-controls'); ?>
            </div>
            <?php
            wp_reset_postdata(); ?>
        <?php endif; ?>
        <?php
        if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="d-flex justify-content-center">
                <div class="elements">
                    <a class="button secondary" href="<?php echo esc_url($link_url); ?>"
                       target="<?php echo esc_attr($link_target); ?>">
                        <?php if ($link_image) { ?>
                            <div class="icon">
                                <?php
                                $link_imageID = $link_image['ID'];
                                echo wp_get_attachment_image($link_imageID, 'large', false, array('loading' => 'lazy'));
                                ?>
                            </div>
                        <?php } ?>
                        <?php echo esc_html($link_title); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>