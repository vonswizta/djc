<?php
$id = 'blog-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$background_colour = get_field('background_colour');
$link = get_field('link');
$items = get_field('items');
$latest_posts = get_field('latest_posts');
$latest_posts_limit = get_field('latest_posts_limit');
?>
<section id="<?php echo esc_attr($id); ?>"
         class="block-padding <?php if ($background_colour) { ?>bg <?php echo $background_colour; ?><?php } ?>">
    <div class="container elements group-gap large">
        <?php get_template_part('parts/global', 'block-intro'); ?>

        <?php if ($latest_posts) { ?>
            <?php if ($latest_posts_limit) { ?>
                <?php
                $the_query = new WP_Query(array(
                    'posts_per_page' => $latest_posts_limit
                ));
                ?>
            <?php } else { ?>
                <?php
                $the_query = new WP_Query(array(
                    'posts_per_page' => -1
                ));
                ?>
            <?php } ?>
            <?php if ($the_query->have_posts()) : ?>
                <div class="swiper cards"
                     data-items="<?php if ($items) { ?><?php echo $items; ?><?php } else { ?>3<?php } ?>">
                    <div class="swiper-wrapper">
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <?php get_template_part('parts/post', 'blog'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <?php get_template_part('parts/global', 'carousel-controls'); ?>
                </div>
            <?php endif; ?>
        <?php } ?>

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
                        <?php get_template_part('parts/post', 'blog'); ?>
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
                    <a class="button tertiary" href="<?php echo esc_url($link_url); ?>"
                       target="<?php echo esc_attr($link_target); ?>">
                        <?php echo esc_html($link_title); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>