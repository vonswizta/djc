<?php

$id = 'accordion-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$background_colour = get_field('background_colour');
$accordion_color = get_field('accordion_colour');
$first_item_open = get_field('first_item_open');
?>

<section id="<?php echo esc_attr($id); ?>"
         class="block-padding <?php if ($background_colour) { ?>bg <?php echo $background_colour; ?><?php } ?> <?php if ($accordion_color) { ?>accordion-coloured<?php } ?>">
    <div class="container group-gap large">
        <?php get_template_part('parts/global', 'block-intro'); ?>
        <?php if (have_rows('items')): $i = 0; ?>
            <div class="row justify-content-lg-center">
                <div class="col-lg-8">
                    <div class="accordion <?php if ($first_item_open) { ?>first-open<?php } ?>"
                         id="accordion-<?php echo esc_attr($id); ?>">
                        <?php while (have_rows('items')): $i++;
                            the_row();
                            $title = get_sub_field('title');
                            $icon = get_sub_field('icon');
                            $content = get_sub_field('content');
                            $image = get_sub_field('image');
                            $image_switch = get_sub_field('image_switch');
                            $list = get_sub_field('list');
                            ?>
                            <div class="accordion-item">
                                <?php if ($title) { ?>
                                    <h2 class="h5">
                                        <button class="accordion-button trigger collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse-<?php echo esc_attr($id); ?>-<?php echo $i; ?>"
                                                aria-expanded="false"
                                                aria-controls="collapse-<?php echo esc_attr($id); ?>-<?php echo $i; ?>">
                                            <span class="icon-text">
                                                <?php if ($icon) { ?>
                                                    <figure class="icon">
                                                    <?php
                                                    $imageID = $icon['ID'];
                                                    echo wp_get_attachment_image($imageID, 'thumbnail', false, array('loading' => 'lazy'));
                                                    ?>
                                                </figure>
                                                <?php } ?>
                                                <span><?php echo $title; ?></span>
                                            </span>
                                        </button>
                                    </h2>
                                <?php } ?>
                                <?php if ($content) { ?>
                                    <div id="collapse-<?php echo esc_attr($id); ?>-<?php echo $i; ?>"
                                         class="accordion-collapse collapse"
                                         data-bs-parent="#accordion-<?php echo esc_attr($id); ?>">
                                        <div class="accordion-body">
                                            <div class="row g-3">
                                                <div class="col-lg group-gap standard">
                                                    <div class="editor">
                                                        <?php echo $content; ?>
                                                    </div>
                                                    <?php if (have_rows('list')): ?>
                                                        <ul class="checklist font-small">
                                                            <?php while (have_rows('list')): the_row();
                                                                $text = get_sub_field('text');
                                                                ?>
                                                                <li>
                                                                    <?php if ($text) { ?>
                                                                        <?php echo $text; ?>
                                                                    <?php } ?>
                                                                </li>
                                                            <?php endwhile; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if ($image) { ?>
                                                    <div class="col-lg-5 <?php if ($image_switch) { ?>image-switch<?php } ?>">
                                                        <figure class="media square rounded-area">
                                                            <?php
                                                            $imageID = $image['ID'];
                                                            echo wp_get_attachment_image($imageID, 'medium', false, array('loading' => 'lazy'));
                                                            ?>
                                                        </figure>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>