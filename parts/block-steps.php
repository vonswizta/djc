<?php
$id = 'steps-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$heading = get_field('heading');
$link = get_field('link');
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
        <?php
        if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="lg:flex lg:justify-center">
                <a class="button" href="<?php echo esc_url($link_url); ?>"
                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>