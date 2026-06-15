<?php
$language_title = get_field('language_title', 'option');
?>
<aside class="language-select">
    <div class="group-gap standard">
        <?php if ($language_title) { ?>
            <h2 class="font-medium visually-hidden"><?php echo $language_title; ?></h2>
        <?php } ?>
        <?php if (shortcode_exists('gtranslate')) { ?>
            <div class="language-choice">
                <?php echo do_shortcode('[gtranslate]'); ?>
            </div>
        <?php } ?>
    </div>
</aside>