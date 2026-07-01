<?php
$id = 'form-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$shortcode = get_field('shortcode');
?>

<?php include locate_template('parts/global-background-colour.php'); ?>

<section id="<?php echo esc_attr($id); ?>"
         class="max-lg:py-6 lg:py-17 <?php echo esc_attr($background_class); ?>">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-12">
            <div class="col-span-12 lg:col-span-6 lg:col-start-4">
                <div class="bg-ivory-white max-lg:p-6 lg:py-8 lg:px-10 rounded-4xl">
                    <?php
                    if ($shortcode) {
                        echo do_shortcode($shortcode);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>