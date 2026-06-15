<?php

$id = 'introduction-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$background_colour = get_field('background_colour');

?>

<section id="<?php echo esc_attr($id); ?>"
         class="block-padding <?php if ($background_colour) { ?>bg <?php echo $background_colour; ?><?php } ?>">
    <div class="container elements group-gap large">
        <?php get_template_part('parts/global', 'block-intro'); ?>
    </div>
</section>