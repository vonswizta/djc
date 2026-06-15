<?php

$id = 'hero-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$heading = get_field('heading');
$link = get_field('link');
$image = get_field('image');

?>

<section id="<?php echo esc_attr($id); ?>" class="hero layers bg dark">
    <div class="layer content elements">
        <div class="inner text-center tall">
            <div class="container tall">
                <div class="detail tall hero-gap <?php if ($link) { ?>justify-content-between<?php } ?>">
                    <div class="hero-header">
                        <h1>
                            <?php if ($heading) { ?>
                                <?php echo $heading; ?>
                            <?php } else { ?>
                                <?php the_title(); ?>
                            <?php } ?>
                        </h1>
                    </div>
                    <?php if ($link):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <div class="hero-link">
                            <a class="button" href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?>">
                                <span><?php echo esc_html($link_title); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="layer graphic">
        <figure class="media banner overlay tall">
            <?php if ($image) { ?>
                <?php
                $imageID = $image['ID'];
                echo wp_get_attachment_image($imageID, 'huge', false, array('loading' => 'eager'));
                ?>
            <?php } ?>
        </figure>
    </div>
</section>