<?php
$id = 'features-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$heading = get_field('heading');
?>
<section id="<?php echo esc_attr($id); ?>">
    <div class="features">
        <?php if ($heading) { ?>
            <div class="features-top">
                <h2 class="title h3"><?php echo $heading; ?></h2>
            </div>
        <?php } ?>
        <?php
        $terms = get_field('features');
        if ($terms): ?>
            <div class="features-middle">
                <ul class="categories-stack columns">
                    <?php foreach ($terms as $term): ?>
                        <?php
                        $image_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                        $image_url = wp_get_attachment_image($image_id, 'thumbnail',false, array('loading' => 'lazy'));
                        ?>
                        <li>
                            <div class="icon">
                                <?php echo $image_url; ?>
                            </div>
                            <div class="title">
                                <?php echo esc_html($term->name); ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</section>