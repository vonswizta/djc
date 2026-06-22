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
    <?php if ($switch) { ?>switch<?php } ?>
    <?php if ($heading) { ?>
        <h2><?php echo $heading; ?></h2>
    <?php } ?>
    <?php if ($text) { ?>
        <div class="space-y-3">
            <?php echo $text; ?>
        </div>
    <?php } ?>
    <?php if (have_rows('highlights')): ?>
        <ul class="highlights">
            <?php while (have_rows('highlights')): the_row();
                $text = get_sub_field('text');
                ?>
                <li>
                    <?php if ($text) { ?>
                        <?php echo $text; ?>
                    <?php } ?>
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
        <a class="button" href="<?php echo esc_url($link_url); ?>"
           target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
    <?php endif; ?>
    <?php if ($image) { ?>
        <?php
        $imageID = $image['ID'];
        echo wp_get_attachment_image($imageID, 'large', false, array('loading' => 'lazy'));
        ?>
    <?php } ?>
</section>