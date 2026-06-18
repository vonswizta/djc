<?php
$id = 'statistics-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$background_colour = get_field('background_colour');
?>
<section id="<?php echo esc_attr($id); ?>"
         class="<?php if ($background_colour) { ?>bg-<?php echo $background_colour; ?><?php } ?>">
    <div class="container mx-auto px-4">
        <?php if (have_rows('statistics')): ?>
            <div class="grid grid-cols-4 gap-4">
                <?php while (have_rows('statistics')): the_row();
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $image = get_sub_field('image');
                    ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                        <?php if ($image) { ?>
                            <figure class="image">
                                <?php
                                $imageID = $image['ID'];
                                echo wp_get_attachment_image($imageID, 'thumbnail', false, array('loading' => 'lazy'));
                                ?>
                            </figure>
                        <?php } ?>
                        <?php if ($title) { ?>
                            <h2>
                                <?php echo $title; ?>
                            </h2>
                        <?php } ?>
                        <?php if ($text) { ?>
                            <div>
                                <?php echo $text; ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>