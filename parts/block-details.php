<?php
$id = 'details-' . $block['id'];
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
        <?php if (have_rows('details')): ?>
            <div class="details features-middle">
                <?php while (have_rows('details')): the_row();
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    ?>
                    <div class="details-item">
                        <div class="details-row row g-lg-3 align-items-lg-center justify-content-lg-between">
                            <?php if ($heading) { ?>
                                <div class="col-lg">
                                    <h3 class="title font-small">
                                        <?php echo $title; ?>
                                    </h3>
                                </div>
                            <?php } ?>
                            <?php if ($text) { ?>
                                <div class="col-lg text-lg-end">
                                    <p class="text font-small">
                                        <?php echo $text; ?>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>