<?php

$id = 'hero-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$heading = get_field('heading');
$summary = get_field('summary');
$image = get_field('image');

?>

<section id="<?php echo esc_attr($id); ?>">
    <div class="grid">
        <div class="col-start-1 lg:row-start-1 relative">
            <?php if ($image) { ?>
                <div class="
        lg:before:content-['']
        lg:before:absolute
        lg:before:inset-0
        lg:before:bg-linear-to-r
        lg:before:from-charcoal-grey
        lg:before:from-30%
        lg:before:to-transparent
        lg:before:to-80% before:z-10">
                    <div class="lg:absolute lg:top-0 lg:right-0 lg:bottom-0 lg:left-[30%] max-lg:aspect-3/1">
                        <?php
                        $imageID = $image['ID'];
                        echo wp_get_attachment_image($imageID, 'huge', false, array('loading' => 'eager', 'class' => 'w-full h-full object-cover'));
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-start-1 lg:row-start-1 z-10 text-ivory-white max-lg:py-4 lg:py-25 max-lg:bg-charcoal-grey">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-12 gap-4">
                    <div class="max-lg:col-span-12 lg:col-span-7 max-lg:space-y-6 lg:space-y-11">
                        <div class="space-y-4">
                            <h1 class="font-merriweather max-lg:text-[calc(35/16*1rem)] lg:text-[calc(65/16*1rem)] leading-[1.2] font-bold">
                                <?php if ($heading) { ?>
                                    <?php echo $heading; ?>
                                <?php } else { ?>
                                    <?php the_title(); ?>
                                <?php } ?>
                            </h1>
                            <?php if ($summary) { ?>
                                <div class="lg:text-[calc(18/16*1rem)]">
                                    <?php echo $summary; ?>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if (have_rows('links')) : ?>
                            <ul class="flex flex-wrap items-center gap-3">
                                <?php while (have_rows('links')) : the_row();

                                    $primary = get_sub_field('primary');
                                    $link = get_sub_field('link');
                                    $url = $link['url'] ?? '';
                                    $title = $link['title'] ?? '';
                                    $target = $link['target'] ?? '_self';

                                    if ($url) :
                                        ?>
                                        <li>
                                            <a class="<?php if ($primary) { ?>button<?php } else { ?>button-outline<?php } ?>"
                                               href="<?php echo esc_url($url); ?>"
                                               target="<?php echo esc_attr($target); ?>">
                                                <?php echo esc_html($title); ?>
                                            </a>
                                        </li>
                                    <?php
                                    endif;

                                endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>