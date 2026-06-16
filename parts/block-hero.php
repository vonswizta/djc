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
        <div class="col-start-1 row-start-1 relative">
            <?php if ($image) { ?>
                <div class="
        before:content-['']
        before:absolute
        before:inset-0
        before:bg-linear-to-r
        before:from-charcoal-grey
        before:from-30%
        before:to-transparent
        before:to-80% before:z-10">
                    <div class="absolute top-0 right-0 bottom-0 left-[30%]">
                        <?php
                        $imageID = $image['ID'];
                        echo wp_get_attachment_image($imageID, 'huge', false, array('loading' => 'eager', 'class' => 'w-full h-full object-cover'));
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-start-1 row-start-1 z-10 text-ivory-white py-25">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-7">
                        <h1 class="font-merriweather text-[4.0625rem] leading-[1.2] font-bold">
                            <?php if ($heading) { ?>
                                <?php echo $heading; ?>
                            <?php } else { ?>
                                <?php the_title(); ?>
                            <?php } ?>
                        </h1>
                        <?php if ($summary) { ?>
                            <div>
                                <?php echo $summary; ?>
                            </div>
                        <?php } ?>
                        <?php if (have_rows('links')) : ?>
                            <ul>
                                <?php while (have_rows('links')) : the_row();

                                    $link = get_sub_field('link');
                                    $url = $link['url'] ?? '';
                                    $title = $link['title'] ?? '';
                                    $target = $link['target'] ?? '_self';

                                    if ($url) :
                                        ?>
                                        <li>
                                            <a href="<?php echo esc_url($url); ?>"
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