<?php

$heading = get_field('heading');
$subheading = get_field('subheading');
$text = get_field('text');

?>

<?php if ($heading) { ?>
    <header class="block-intro row justify-content-lg-center">
        <div class="col-lg-8">
            <div class="group-gap small text-center">
                <?php if ($subheading) { ?>
                    <p><?php echo $subheading; ?></p>
                <?php } ?>
                <h2><?php echo $heading; ?></h2>
                <?php if ($text) { ?>
                    <div class="editor">
                        <?php echo $text; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </header>
<?php } ?>