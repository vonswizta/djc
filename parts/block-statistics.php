<?php
$id = 'statistics-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$background_colour = get_field('background_colour');

$background_classes = [
    'champagne-gold' => 'bg-champagne-gold',
    'ivory-white' => 'bg-ivory-white',
];

$background_class = $background_classes[$background_colour] ?? '';
?>

<section id="<?php echo esc_attr($id); ?>"
         class="max-lg:py-4 lg:py-8 <?php if ($background_colour) { ?><?php echo $background_class; ?><?php } ?>">
    <div class="container mx-auto px-4">
        <?php if (have_rows('statistics')): ?>
            <div class="bg-ivory-white max-lg:p-6 lg:py-8 lg:px-10 rounded-4xl">
                <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-6">
                    <?php while (have_rows('statistics')): the_row();
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        $image = get_sub_field('image');
                        ?>
                        <div class="grid grid-cols-[auto_1fr] gap-3">
                            <?php if ($image) { ?>
                                <figure class="w-[calc(60/16*1rem)] aspect-square">
                                    <?php
                                    $imageID = $image['ID'];
                                    echo wp_get_attachment_image($imageID, 'thumbnail', false, array('loading' => 'lazy', 'class' => 'w-full h-full object-contain'));
                                    ?>
                                </figure>
                            <?php } ?>
                            <div class="details">
                                <?php if ($title) { ?>
                                    <h2 class="font-merriweather max-lg:text-[calc(35/16*1rem)] lg:text-[calc(50/16*1rem)] leading-[1.2] font-bold">
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
            </div>
        <?php endif; ?>
    </div>
</section>