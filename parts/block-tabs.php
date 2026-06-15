<?php

$id = 'tabs-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$background_colour = get_field('background_colour');

?>

<section id="<?php echo esc_attr($id); ?>"
         class="block-padding <?php if ($background_colour) { ?>bg <?php echo $background_colour; ?><?php } ?>">
    <div class="container group-gap large">
        <?php get_template_part('parts/global', 'block-intro'); ?>
        <?php if (have_rows('tabs')): $i = 0;
            $a = 0; ?>
            <div class="tabs-wrapper">
                <ul class="nav nav-tabs tab-nav row g-1" id="tab-nav-<?php the_ID(); ?>" role="tablist">
                    <?php while (have_rows('tabs')): $i++;
                        the_row();
                        $title = get_sub_field('title');
                        $icon = get_sub_field('icon');
                        $larger_icon = get_sub_field('larger_icon');
                        ?>
                        <li class="nav-item col-6 col-lg-auto" role="presentation">
                            <button class="nav-link trigger" id="tab-<?php echo $i; ?>" data-bs-toggle="tab"
                                    data-bs-target="#tab-pane-<?php echo $i; ?>"
                                    type="button" role="tab" aria-controls="tab-pane-<?php echo $i; ?>"
                                    aria-selected="false">
                                <?php if ($icon) { ?>
                                    <figure class="media square <?php if ($larger_icon) { ?>larger-icon<?php } ?>">
                                        <?php
                                        $imageID = $icon['ID'];
                                        echo wp_get_attachment_image($imageID, 'large', false, array('loading' => 'lazy'));
                                        ?>
                                    </figure>
                                <?php } ?>
                                <?php if ($title) { ?>
                                    <h2 class="font-small">
                                        <?php echo $title; ?>
                                    </h2>
                                <?php } ?>
                            </button>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <div class="tab-content" id="tab-content-<?php the_ID(); ?>">
                    <?php while (have_rows('tabs')): $a++;
                        the_row();
                        $heading = get_sub_field('heading');
                        $content = get_sub_field('content');
                        $image = get_sub_field('image');
                        $first_item_open = get_sub_field('first_item_open');
                        ?>
                        <div class="tab-pane fade" id="tab-pane-<?php echo $a; ?>" role="tabpanel"
                             aria-labelledby="tab-<?php echo $a; ?>" tabindex="0">
                            <?php if ($content) { ?>
                                <div class="content-wrap group-gap medium">
                                    <?php if ($heading) { ?>
                                        <h2 class="h3 text-center">
                                            <?php echo $heading; ?>
                                        </h2>
                                    <?php } ?>
                                    <div class="row g-3">
                                        <?php if ($image) { ?>
                                            <div class="col-lg-6">
                                                <figure class="media widescreen rounded-area">
                                                    <?php
                                                    $imageID = $image['ID'];
                                                    echo wp_get_attachment_image($imageID, 'thumbnail', false, array('loading' => 'lazy'));
                                                    ?>
                                                </figure>
                                            </div>
                                        <?php } ?>
                                        <?php if ($content) { ?>
                                            <div class="col-lg">
                                                <div class="editor">
                                                    <?php echo $content; ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (have_rows('accordion')): $x = 0;
                                $uniqid = uniqid('item_'); ?>
                                <div class="row justify-content-lg-center">
                                    <div class="col-lg-8">
                                        <div class="accordion divided <?php if ($first_item_open) { ?>first-open<?php } ?>"
                                             id="accordion-<?php echo $uniqid; ?>">
                                            <?php while (have_rows('accordion')): $x++;
                                                the_row();
                                                $title = get_sub_field('title');
                                                $content = get_sub_field('content');
                                                $video = get_sub_field('video');
                                                ?>
                                                <div class="accordion-item">
                                                    <?php if ($title) { ?>
                                                        <h2 class="h5">
                                                            <button class="accordion-button trigger collapsed"
                                                                    type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapse-<?php echo $uniqid; ?>-<?php echo $x; ?>"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse-<?php echo $uniqid; ?>-<?php echo $x; ?>">
                                                                <span><?php echo $title; ?></span>
                                                            </button>
                                                        </h2>
                                                    <?php } ?>
                                                    <?php if ($content || $video) { ?>
                                                        <div id="collapse-<?php echo $uniqid; ?>-<?php echo $x; ?>"
                                                             class="accordion-collapse collapse"
                                                             data-bs-parent="#accordion-<?php echo $uniqid; ?>">
                                                            <div class="accordion-body">
                                                                <div class="row g-3">
                                                                    <div class="col-lg group-gap standard">
                                                                        <?php if ($content) { ?>
                                                                            <div class="editor">
                                                                                <?php echo $content; ?>
                                                                            </div>
                                                                        <?php } ?>
                                                                        <?php if ($video) { ?>
                                                                            <figure class="media embed">
                                                                                <?php echo $video; ?>
                                                                            </figure>
                                                                        <?php } ?>
                                                                    </div>
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
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
</section>