<?php

$id = 'banner-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$heading = get_field('heading');
$summary = get_field('summary');
$image = get_field('image');

?>

    <header id="<?php echo esc_attr($id); ?>" aria-labelledby="page-title" class="bg-charcoal-grey text-ivory-white">
        <div class="grid">
            <div class="col-start-1 lg:row-start-1 z-10">
                <div class="container mx-auto px-4">
                    <div class="grid grid-cols-12 lg:gap-25">
                        <div class="max-lg:col-span-12 max-lg:space-y-4 lg:space-y-7 max-lg:py-7 lg:py-20 lg:col-span-6">
                            <h1 id="page-title"
                                class="font-merriweather max-lg:text-[calc(30/16*1rem)] lg:text-[calc(60/16*1rem)] leading-[1] font-bold">
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
                    </div>
                </div>
            </div>
            <div class="col-start-1 lg:row-start-1">
                <div class="grid grid-cols-12 h-full">
                    <div class="max-lg:col-span-12 relative lg:col-span-6 lg:col-start-7">
                        <div class="max-lg:aspect-21/9 lg:absolute lg:inset-0">
                            <?php
                            $imageID = $image['ID'];
                            echo wp_get_attachment_image($imageID, 'huge', false, array('loading' => 'eager', 'class' => 'w-full h-full object-cover'));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php if (!is_front_page()) : ?>
    <?php get_template_part('parts/global', 'breadcrumb'); ?>
<?php endif; ?>