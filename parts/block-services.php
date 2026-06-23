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
         class="max-lg:py-6 lg:py-17 <?php echo esc_attr($background_class); ?>">
    <div class="container mx-auto px-4 space-y-4 lg:space-y-8">
        <div class="grid lg:grid-cols-12">
            <div class="lg:col-span-8 space-y-2">
                <?php if ($heading) { ?>
                    <h2 class="font-merriweather max-lg:text-[calc(26/16*1rem)] lg:text-[calc(40/16*1rem)] leading-[1.2] font-bold"><?php echo $heading; ?></h2>
                <?php } ?>
                <?php if ($text) { ?>
                    <div class="lg:text-lg"><?php echo $text; ?></div>
                <?php } ?>
            </div>
        </div>
        <?php
        $term_ids = get_field('services');
        if ($term_ids): ?>
            <div class="grid lg:grid-cols-2 gap-5">
                <?php foreach ($term_ids as $term_id):
                    $term = get_term($term_id);
                    $image = get_field('image', $term);
                    $description = $term->description;
                    ?>
                    <div class="bg-ivory-white border-b-[calc(10/16*1rem)] border-b-jewel-green rounded-2xl overflow-hidden">
                        <?php if ($image) : ?>
                            <div class="aspect-3/1">
                                <?php
                                $imageID = $image['ID'];
                                echo wp_get_attachment_image($imageID, 'medium', false, array('loading' => 'lazy', 'class' => 'w-full h-full object-cover'));
                                ?>
                            </div>
                        <?php endif; ?>
                        <div class="p-4 lg:p-8 space-y-1 lg:space-y-2">
                            <h2 class="font-merriweather max-lg:text-[calc(22/16*1rem)] lg:text-[calc(30/16*1rem)] leading-[1.2] font-bold"><?php echo esc_html($term->name); ?></h2>
                            <?php if (!empty(trim($description))) : ?>
                                <p><?php echo wp_kses_post($description); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
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