<?php
$menu_footer_title = get_field('menu_footer_title', 'option');
?>

<div class="menu-footer group-gap">
    <?php if ($menu_footer_title) { ?>
        <h2 class="font-medium"><?php echo $menu_footer_title; ?></h2>
    <?php } ?>
    <?php menu_footer(); ?>
</div>
