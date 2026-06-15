<?php
$menu_quicklinks_title = get_field('menu_quicklinks_title', 'option');
?>

<div class="menu-footer group-gap">
    <?php if ($menu_quicklinks_title) { ?>
        <h2 class="font-medium"><?php echo $menu_quicklinks_title; ?></h2>
    <?php } ?>
    <?php menu_quicklinks(); ?>
</div>
