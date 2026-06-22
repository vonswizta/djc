<?php
$id = 'services-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$heading = get_field('heading');
$text = get_field('text');
$link = get_field('link');
?>

<?php include locate_template('parts/global-background-colour.php'); ?>

<section id="<?php echo esc_attr($id); ?>"
         class="<?php echo esc_attr($background_class); ?>">
    <?php if ($heading) { ?>
        <h2><?php echo $heading; ?></h2>
    <?php } ?>
    <?php if ($text) { ?>
        <div><?php echo $text; ?></div>
    <?php } ?>
    <?php
    $term_ids = get_field('services');
    if ($term_ids) {
        foreach ($term_ids as $term_id) {
            $term = get_term($term_id);
            $image = get_field('image', $term);
            $description = $term->description;
            ?>
            <?php if ($image) : ?>
                <div class="aspect-16/9">
                    <?php
                    $imageID = $image['ID'];
                    echo wp_get_attachment_image($imageID, 'medium', false, array('loading' => 'lazy', 'class' => 'w-full h-full object-cover'));
                    ?>
                </div>
            <?php endif; ?>
            <h2><?php echo esc_html($term->name); ?></h2>
            <?php if (!empty(trim($description))) : ?>
                <p><?php echo wp_kses_post($description); ?></p>
            <?php endif; ?>
        <?php }
    } ?>
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
</section>