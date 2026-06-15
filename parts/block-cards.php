<?php
$id = 'cards-' . $block['id'];
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
        <?php if (have_rows('cards')): ?>
            <div class="swiper cards" data-items="<?php if ($items) { ?><?php echo $items; ?><?php } else { ?>3<?php } ?>">
                <div class="swiper-wrapper">
                    <?php while (have_rows('cards')): the_row();
                        $image = get_sub_field('image');
                        $heading = get_sub_field('heading');
                        $text = get_sub_field('text');
                        $link_card = get_sub_field('link');
                        ?>
                        <article
                                id="post-<?php the_ID(); ?>" <?php post_class('swiper-slide d-flex'); ?>>
                            <div class="card link-cover">
                                <div class="card-top padded text-center group-gap standard">
                                    <?php if ($image) { ?>
                                        <figure class="media square rounded-area">
                                            <?php
                                            $imageID = $image['ID'];
                                            echo wp_get_attachment_image($imageID, 'medium', false, array('loading' => 'lazy'));
                                            ?>
                                        </figure>
                                    <?php } ?>
                                    <?php if ($heading) { ?>
                                        <h2 class="serif font-increase">
                                            <?php echo $heading; ?>
                                        </h2>
                                    <?php } ?>
                                </div>
                                <div class="card-bottom padded d-flex flex-column justify-content-between group-gap standard">
                                    <?php if ($text) { ?>
                                        <div class="editor">
                                            <?php echo $text; ?>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if ($link_card):
                                        $link_url = $link_card['url'];
                                        $link_title = $link_card['title'];
                                        $link_target = $link_card['target'] ? $link['target'] : '_self';
                                        ?>
                                        <div class="button-link">
                                            <a class="button no-arrow secondary d-flex link-cover-target"
                                               href="<?php echo esc_url($link_url); ?>"
                                               target="<?php echo esc_attr($link_target); ?>">
                                                <?php echo esc_html($link_title); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
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