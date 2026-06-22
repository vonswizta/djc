<?php
$id = 'benefits-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$heading = get_field('heading');
?>

<?php include locate_template('parts/global-background-colour.php'); ?>

<section id="<?php echo esc_attr($id); ?>"
         class="max-lg:py-4 lg:py-17 <?php echo esc_attr($background_class); ?>">
    <div class="container mx-auto px-4">
        <?php if ($heading) { ?>
            <h2 class="font-merriweather max-lg:text-[calc(24/16*1rem)] lg:text-[calc(35/16*1rem)] leading-[1.2] font-bold text-center">
                <?php echo $heading; ?>
            </h2>
        <?php } ?>
        <?php if (have_rows('benefits')): ?>
            <div class="grid sm:grid-cols-2 xl:grid-cols-4 max-lg:gap-4 lg:gap-8">
                <?php while (have_rows('benefits')): the_row();
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $image = get_sub_field('image');
                    ?>
                    <div class="item">
                        <?php if ($image) { ?>
                            <div class="flex justify-center">
                                <figure class="w-[calc(90/16*1rem)] aspect-square">
                                    <?php
                                    $imageID = $image['ID'];
                                    echo wp_get_attachment_image($imageID, 'thumbnail', false, array('loading' => 'lazy', 'class' => 'w-full h-full object-contain'));
                                    ?>
                                </figure>
                            </div>
                        <?php } ?>
                        <div class="details">
                            <?php if ($title) { ?>
                                <h2 class="font-merriweather max-lg:text-[calc(18/16*1rem)] lg:text-[calc(22/16*1rem)] leading-[1.2] font-bold">
                                    <?php echo $title; ?>
                                </h2>
                            <?php } ?>
                            <?php if ($text) { ?>
                                <div>
                                    <?php echo $text; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>