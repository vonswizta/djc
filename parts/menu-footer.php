<?php
$menu_footer_title = get_field('menu_footer_title', 'option');
?>

<?php if ($menu_footer_title) { ?>
    <h2><?php echo $menu_footer_title; ?></h2>
<?php } ?>
<?php menu_footer(); ?>
