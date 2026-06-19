<?php
$phone = get_field('header_phone', 'option');
$button = get_field('header_button', 'option');
?>
<?php
if ($phone):
    $link_url = $phone['url'];
    $link_title = $phone['title'];
    $link_target = $phone['target'] ? $phone['target'] : '_self';
    ?>
    <a class="button-outline before:content-[''] before:flex-none before:aspect-square before:w-6 before:bg-ivory-white before:[mask:url('../images/call.svg')_center/contain_no-repeat]"
       href="<?php echo esc_url($link_url); ?>"
       target="<?php echo esc_attr($link_target); ?>">
        <span><?php echo esc_html($link_title); ?></span>
    </a>
<?php endif; ?>
<?php
if ($button):
    $link_url = $button['url'];
    $link_title = $button['title'];
    $link_target = $button['target'] ? $button['target'] : '_self';
    ?>
    <a class="button" href="<?php echo esc_url($link_url); ?>"
       target="<?php echo esc_attr($link_target); ?>">
        <span><?php echo esc_html($link_title); ?></span>
    </a>
<?php endif; ?>