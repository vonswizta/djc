<?php
$id = 'benefits-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$background_colour = get_field('background_colour');
$link = get_field('link');
$link_image = get_field('link_image');
$items = get_field('items');
$icon_small = get_field('icon_small');
$alternative_title = get_field('alternative_title');
$alternative_background_colour = get_field('alternative_background_colour');
?>
<section id="<?php echo esc_attr($id); ?>"
         class="block-padding <?php if ($background_colour) { ?>bg <?php echo $background_colour; ?><?php } ?> <?php if ($icon_small) { ?>icon-small<?php } ?> <?php if ($alternative_title) { ?>alternative-title<?php } ?> <?php if ($alternative_background_colour) { ?>alternative-background-colour<?php } ?>">
    <div class="container elements group-gap large">
        <?php get_template_part('parts/global', 'block-intro'); ?>
        <?php if (have_rows('benefits')): ?>
            <div class="swiper cards" data-items="<?php if ($items) { ?><?php echo $items; ?><?php } else { ?>3<?php } ?>">
                <div class="swiper-wrapper">
                    <?php while (have_rows('benefits')): the_row();
                        $heading = get_sub_field('heading');
                        $text = get_sub_field('text');
                        $image = get_sub_field('image');
                        $extra_text = get_sub_field('extra_text');
                        $coloured_background = get_sub_field('coloured_background');
                        $link_card = get_sub_field('link');
                        ?>
                        <article
                                id="post-<?php the_ID(); ?>" <?php post_class('swiper-slide image-text-panel'); ?>>
                            <div class="card-parts group-gap standard">
                                <div class="card-parts-top group-gap standard">
                                    <?php if ($image) { ?>
                                        <figure class="image">
                                            <?php
                                            $imageID = $image['ID'];
                                            echo wp_get_attachment_image($imageID, 'thumbnail', false, array('loading' => 'lazy'));
                                            ?>
                                        </figure>
                                    <?php } ?>
                                    <?php if ($heading) { ?>
                                        <h2 class="title">
                                            <?php echo $heading; ?>
                                        </h2>
                                    <?php } ?>
                                    <?php if ($text) { ?>
                                        <div class="editor font-medium">
                                            <?php echo $text; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php if ($extra_text || $link_card) { ?>
                                <div class="card-parts-bottom group-gap standard">
                                    <?php } ?>
                                    <?php if ($extra_text) { ?>
                                        <p class="bold font-medium text-lg-center">
                                            <?php echo $extra_text; ?>
                                        </p>
                                    <?php } ?>
                                    <?php
                                    if ($link_card):
                                        $link_url = $link_card['url'];
                                        $link_title = $link_card['title'];
                                        $link_target = $link_card['target'] ? $link['target'] : '_self';
                                        ?>
                                        <div class="button-link">
                                            <a class="button secondary d-flex" href="<?php echo esc_url($link_url); ?>"
                                               target="<?php echo esc_attr($link_target); ?>">
                                                <?php echo esc_html($link_title); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($extra_text || $link_card) { ?>
                                </div>
                            <?php } ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php get_template_part('parts/global', 'carousel-controls'); ?>
            </div>
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