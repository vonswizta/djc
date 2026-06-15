<?php

$address = get_field('address', 'option');
$email = get_field('email', 'option');
$telephone = get_field('telephone', 'option');
$newsletter = get_field('newsletter', 'option');

?>

<footer class="footer bg dark block-padding-small" itemscope itemtype="http://schema.org/WPFooter">
    <div class="container elements">
        <div class="row g-3 align-items-lg-center">
            <div class="col-lg-4">
                <?php get_template_part('parts/global', 'logo'); ?>
            </div>
            <div class="col-lg">
                <div class="row g-3">
                    <div class="col-lg">
                        <?php get_template_part('parts/menu', 'footer'); ?>
                    </div>
                    <div class="col-lg">
                        <?php get_template_part('parts/menu', 'quicklinks'); ?>
                    </div>
                    <div class="col-lg">
                        <?php get_template_part('parts/global', 'social'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="visually-hidden">
            &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>
        </div>
    </div>
</footer>