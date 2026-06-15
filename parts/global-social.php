<?php
$social_links_title = get_field('social_links_title', 'option');
?>
<?php if (have_rows('social_links', 'option')): ?>
    <div class="social-links group-gap">
        <?php if ($social_links_title) { ?>
            <h2 class="font-medium"><?php echo $social_links_title; ?></h2>
        <?php } ?>
        <ul>
            <?php while (have_rows('social_links', 'option')): the_row(); ?>
                <?php
                $link = get_sub_field('link');
                if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <li>
                        <a href="<?php echo esc_url($link_url); ?>"
                           target="<?php echo esc_attr($link_target); ?>">
                            <span><?php echo esc_html($link_title); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endwhile; ?>
        </ul>
    </div>
<?php endif; ?>