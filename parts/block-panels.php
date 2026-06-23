<?php

$id = 'panels-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$heading = get_field('heading');
$text = get_field('text');
$link = get_field('link');
$image = get_field('image');
$switch = get_field('switch');

?>

<?php include locate_template('parts/global-background-colour.php'); ?>

<section id="<?php echo esc_attr($id); ?>"
         class="<?php echo esc_attr($background_class); ?>">
    <div class="grid">
        <div class="col-start-1 lg:row-start-1 z-10">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-12 lg:gap-25">
                    <div class="max-lg:col-span-12 max-lg:space-y-6 lg:space-y-10 max-lg:py-4 lg:py-17 <?php if ($switch) { ?>lg:col-span-6 lg:col-start-7<?php } else { ?>lg:col-span-6<?php } ?>">
                        <div class="max-lg:space-y-4 lg:space-y-6">
                            <?php if ($heading) { ?>
                                <h2 class="font-merriweather max-lg:text-[calc(26/16*1rem)] lg:text-[calc(40/16*1rem)] leading-[1.2] font-bold"><?php echo $heading; ?></h2>
                            <?php } ?>
                            <?php if ($text) { ?>
                                <div class="space-y-3">
                                    <?php echo $text; ?>
                                </div>
                            <?php } ?>
                            <?php if (have_rows('highlights')): ?>
                                <ul class="highlights space-y-3">
                                    <?php while (have_rows('highlights')): the_row();
                                        $text = get_sub_field('text');
                                        ?>
                                        <li class="flex items-center gap-2 before:content-[''] before:flex-none before:aspect-square before:w-5 before:bg-moss before:[mask:url('../images/tick.svg')_center/contain_no-repeat]">
                                            <?php if ($text) { ?>
                                                <?php echo $text; ?>
                                            <?php } ?>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <?php
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <div class="button-wrap">
                                <a class="button" href="<?php echo esc_url($link_url); ?>"
                                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-start-1 lg:row-start-1">
            <div class="grid grid-cols-12 h-full">
                <div class="max-lg:col-span-12 relative <?php if ($switch) { ?>lg:col-span-6<?php } else { ?>lg:col-span-6 lg:col-start-7<?php } ?>">
                    <div class="max-lg:aspect-21/9 lg:absolute lg:inset-0">
                        <?php if ($image) { ?>
                            <?php
                            $imageID = $image['ID'];
                            echo wp_get_attachment_image($imageID, 'large', false, array('loading' => 'lazy', 'class' => 'w-full h-full object-cover'));
                            ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>