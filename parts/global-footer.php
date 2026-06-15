<?php

$address = get_field('address', 'option');
$email = get_field('email', 'option');
$telephone = get_field('telephone', 'option');
$newsletter = get_field('newsletter', 'option');

?>

<footer>
    <?php get_template_part('parts/global', 'logo'); ?>
    <?php get_template_part('parts/menu', 'footer'); ?>
    <?php get_template_part('parts/global', 'social'); ?>
</footer>