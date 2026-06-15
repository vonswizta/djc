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
    <div class="container mx-auto px-4">
        <h1>
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

        <?php if ($image) { ?>
            <?php
            $imageID = $image['ID'];
            echo wp_get_attachment_image($imageID, 'huge', false, array('loading' => 'eager'));
            ?>
        <?php } ?>
    </div>
</section>