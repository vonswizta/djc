<?php
$id = 'steps-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$heading = get_field('heading');
?>

<section id="<?php echo esc_attr($id); ?>"
         class="max-lg:py-6 lg:py-17 bg-charcoal-grey text-ivory-white">
    <div class="container mx-auto px-4 space-y-8">
        <?php if ($heading) { ?>
            <h2 class="font-merriweather max-lg:text-[calc(24/16*1rem)] lg:text-[calc(35/16*1rem)] leading-[1.2] font-bold xl:text-center">
                <?php echo $heading; ?>
            </h2>
        <?php } ?>
        <?php if (have_rows('steps')): ?>
            <ul class="steps grid sm:grid-cols-2 xl:grid-cols-4 max-lg:gap-6 lg:gap-15">
                <?php while (have_rows('steps')): the_row();
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    ?>
                    <li class="xl:text-center xl:flex xl:flex-col xl:items-center xl:relative">
                        <div class="inner">
                            <div class="details space-y-2">
                                <?php if ($title) { ?>
                                    <h2 class="font-merriweather max-lg:text-[calc(18/16*1rem)] lg:text-[calc(30/16*1rem)] leading-[1.2] font-bold">
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
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>