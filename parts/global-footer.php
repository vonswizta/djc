<?php

$address = get_field('address', 'option');
$email = get_field('email', 'option');
$telephone = get_field('telephone', 'option');
$newsletter = get_field('newsletter', 'option');

?>

<footer class="bg-charcoal-grey text-white border-t-4 border-t-jewel-green py-17">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center justify-between">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-3">
                    <div class="flex flex-wrap flex-col items-start gap-5">
                        <?php get_template_part('parts/global', 'logo'); ?>
                        <p><?php bloginfo('description'); ?></p>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-9">
                    <?php get_template_part('parts/menu', 'footer'); ?>
                </div>
            </div>
        </div>
    </div>
</footer>