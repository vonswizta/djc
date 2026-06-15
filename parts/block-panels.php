<?php

$id = 'panels-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$background_colour = get_field('background_colour');
$heading = get_field('heading');
$subheading = get_field('subheading');
$text = get_field('text');
$link = get_field('link');
$image = get_field('image');
$image_gap = get_field('image_gap');
$switch = get_field('switch');

?>

<section id="<?php echo esc_attr($id); ?>"
         class="layers stack <?php if ($background_colour) { ?>bg <?php echo $background_colour; ?><?php } ?>">
    <div class="layer content">
        <div class="container tall">
            <div class="row gx-lg-6 tall <?php if ($switch) { ?>justify-content-lg-end<?php } ?>">
                <div class="col-lg-6 elements d-flex align-items-center">
                    <div class="block-padding group-gap small">
                        <?php if ($subheading) { ?>
                            <p><?php echo $subheading; ?></p>
                        <?php } ?>
                        <?php if ($heading) { ?>
                            <h2><?php echo $heading; ?></h2>
                        <?php } ?>
                        <?php if ($text) { ?>
                            <div class="editor">
                                <?php echo $text; ?>
                            </div>
                        <?php } ?>
                        <?php
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="button tertiary" href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layer image <?php if ($image_gap) { ?>image-gap<?php } ?>">
        <div class="row g-0 tall <?php if (!$switch) { ?>justify-content-lg-end<?php } ?>">
            <div class="col-lg-6 tall">
                <div class="layers tall overflow">
                    <?php if (have_rows('offers')): ?>
                        <div class="layer content inner-layer">
                            <div class="offers">
                                <?php while (have_rows('offers')): the_row();
                                    $heading = get_sub_field('heading');
                                    $text = get_sub_field('text');
                                    $value = get_sub_field('value');
                                    ?>
                                    <div class="offer">
                                        <div class="detail">
                                            <div class="info">
                                                <?php if ($heading) { ?>
                                                    <h2 class="font-medium">
                                                        <?php echo $heading; ?>
                                                    </h2>
                                                <?php } ?>
                                                <?php if ($text) { ?>
                                                    <p class="font-tiny">
                                                        <?php echo $text; ?>
                                                    </p>
                                                <?php } ?>
                                            </div>
                                            <?php if ($value) { ?>
                                                <p class="h2 bold">
                                                    <?php echo $value; ?>
                                                </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="layer graphic">
                        <figure class="media tile tall">
                            <?php if ($image) { ?>
                                <?php
                                $imageID = $image['ID'];
                                echo wp_get_attachment_image($imageID, 'large', false, array('loading' => 'lazy'));
                                ?>
                            <?php } ?>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>